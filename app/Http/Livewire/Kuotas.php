<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Kuota;

class Kuotas extends Component
{
    public $kuotas, $tanggal, $qty, $sisa, $aktif, $kuota_id;
    public $isModal = false;

    public function render()
    {
        $this->kuotas = Kuota::orderBy('created_at', 'DESC')->get();
        return view('livewire.kuota');
    }

    //FUNGSI INI AKAN DIPANGGIL KETIKA TOMBOL DAFTAR DITEKAN
    public function create()
    {
        //KEMUDIAN DI DALAMNYA KITA MENJALANKAN FUNGSI UNTUK MENGOSONGKAN FIELD
        $this->resetFields();
        //DAN MEMBUKA MODAL
        $this->openModal();
    }

    //FUNGSI INI UNTUK MENUTUP MODAL DIMANA VARIABLE ISMODAL KITA SET JADI FALSE
    public function closeModal()
    {
        $this->isModal = false;
    }

    //FUNGSI INI DIGUNAKAN UNTUK MEMBUKA MODAL
    public function openModal()
    {
        $this->isModal = true;
    }

    //FUNGSI INI UNTUK ME-RESET FIELD/KOLOM, SESUAIKAN FIELD APA SAJA YANG KAMU MILIKI
    public function resetFields()
    {
        $this->tanggal = '';
        $this->qty = '';
        $this->aktif = '';
        
    }

    //METHOD STORE AKAN MENG-HANDLE FUNGSI UNTUK MENYIMPAN / UPDATE DATA
    public function store()
    {
        //MEMBUAT VALIDASI
        $this->validate([
            'tanggal' => 'required',
            'qty' => 'required|numeric',
            'aktif' => 'required',
        ]);

        //QUERY UNTUK MENYIMPAN / MEMPERBAHARUI DATA MENGGUNAKAN UPDATEORCREATE
        //DIMANA ID MENJADI UNIQUE ID, JIKA IDNYA TERSEDIA, MAKA UPDATE DATANYA
        //JIKA TIDAK, MAKA TAMBAHKAN DATA BARU
        Kuota::updateOrCreate(['id' => $this->kuota_id], [
            'tanggal' => $this->tanggal,
            'qty' => $this->qty,
            'sisa' => $this->qty,
            'aktif' => $this->aktif
            
        ]);

        //BUAT FLASH SESSION UNTUK MENAMPILKAN ALERT NOTIFIKASI
        session()->flash('message', $this->id ? $this->tanggal . ' Diperbaharui': $this->tanggal . ' Ditambahkan');
        $this->closeModal(); //TUTUP MODAL
        $this->resetFields(); //DAN BERSIHKAN FIELD
    }

    //FUNGSI INI UNTUK MENGAMBIL DATA DARI DATABASE BERDASARKAN ID MEMBER
    public function edit($id)
    {
        $kuota = Kuota::find($id); //BUAT QUERY UTK PENGAMBILAN DATA
        //LALU ASSIGN KE DALAM MASING-MASING PROPERTI DATANYA
        $this->kuota_id = $id;
        $this->tanggal = $kuota->tanggal;
        $this->qty = $kuota->qty;
        // $this->sisa = $kuota->qty;
        $this->aktif = $kuota->aktif;

        $this->openModal(); //LALU BUKA MODAL
    }

    //FUNGSI INI UNTUK MENGHAPUS DATA
    public function delete($id)
    {
        $daftar = Kuota::find($id); //BUAT QUERY UNTUK MENGAMBIL DATA BERDASARKAN ID
        $daftar->delete(); //LALU HAPUS DATA
        session()->flash('message', $daftar->nama . ' Dihapus'); //DAN BUAT FLASH MESSAGE UNTUK NOTIFIKASI
    }
}
