<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Daftar;
use App\Models\Kuota;
use Illuminate\Support\Facades\Session;

class VaksinController extends Controller
{
    //
    public function index()
    {
        //get data kuota apakah masih ada
        $kuota=Kuota::where('aktif','=',1)->get();
              
        return view('vaksin', [
            'kuotatgl' => $kuota,
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'nama' => 'required|string',
            'nik' => 'required|unique:daftars,nik,',
            'nohp' => 'required|numeric:daftars,nohp,',
            'tglvaksin' => 'required',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        //cek data sisa kuota
        $kuotatgl= Kuota::where('tanggal','=',$request->tglvaksin)->first();
        $sisakuota= (int)$kuotatgl->sisa;

        // 
        $anchor = 'daftar';

        if ($sisakuota != 0) {
            // Simpan Data Pendaftar
            $data = new Daftar();

            $data->nik = $request->nik;
            $data->nama = $request->nama;
            $data->nohp = $request->nohp;
            $data->dosis1 = $request->tglvaksin;
            $data->save();

            //UPDATE SISA KUOTA
            $cek = Kuota::where('tanggal','=',$request->tglvaksin)->firstOrFail();
            // dd($cek);

            $sisa = $sisakuota - 1;
            $cek->sisa = $sisa;
            
            $cek->save(); 
            
            //BUAT FLASH SESSION UNTUK MENAMPILKAN ALERT NOTIFIKASI
            Session::flash('sukses','Data berhasil disimpan');
        
            $kuota=Kuota::where('aktif','=',1)->get();
                
            return view('vaksin', [
                'kuotatgl' => $kuota,
                'anchor' => $anchor,
            ]);

        }
        else {
            # code...
            //UPDATE SISA KUOTA
            $cek = Kuota::where('tanggal','=',$request->tglvaksin)->firstOrFail();

            $cek->aktif = 0;

            $cek->save(); 
            
            //BUAT FLASH SESSION UNTUK MENAMPILKAN ALERT NOTIFIKASI
            Session::flash('gagal','Kuota tanggal yang dipilih telah penuh');
            
            //MENARIK DATA TANGGAL YANG MASIH ADA SISA
            $kuota=Kuota::where('aktif','=',1)->get();
                
            return view('vaksin', [
                'kuotatgl' => $kuota,
                'anchor' => $anchor,
            ]);
        }
        

        
    }

    public function cari(Request $request)
    {
        $this->validate($request,[
            //'nama' => 'required|string',
            'NIK' => 'required',
            //'nohp' => 'required|numeric',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        
        $daftar = Daftar::where('nik', '=', $request->NIK)
                ->get();
        // dd($daftar);
        $kuota=Kuota::where('aktif','=',1)->get();

        $anchor = 'cekdata';

        return view('vaksin',  [
            'cari' => $daftar,
            'kuotatgl' => $kuota,
            'anchor' => $anchor,
        ]);
    }
}
