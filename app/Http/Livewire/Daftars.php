<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Daftar;

class Daftars extends Component
{
    public $daftars, $nama, $nik, $nohp, $daftar_id;
    public $isModal = false;
    
    public function render()
    {
        $this->daftars = Daftar::orderBy('created_at', 'DESC')->get(); //MEMBUAT QUERY UNTUK MENGAMBIL DATA
        return view('livewire.daftars');
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
        $this->nama = '';
        $this->nik = '';
        $this->nohp = '';
        
    }

    //METHOD STORE AKAN MENG-HANDLE FUNGSI UNTUK MENYIMPAN / UPDATE DATA
    public function store()
    {
        //MEMBUAT VALIDASI
        $this->validate([
            'nama' => 'required|string',
            'nik' => 'required|numeric',
            'nohp' => 'required|numeric',
        ]);

        //QUERY UNTUK MENYIMPAN / MEMPERBAHARUI DATA MENGGUNAKAN UPDATEORCREATE
        //DIMANA ID MENJADI UNIQUE ID, JIKA IDNYA TERSEDIA, MAKA UPDATE DATANYA
        //JIKA TIDAK, MAKA TAMBAHKAN DATA BARU
        Daftar::updateOrCreate(['id' => $this->daftar_id], [
            'nama' => $this->nama,
            'nik' => $this->nik,
            'nohp' => $this->nohp
            
        ]);

        //BUAT FLASH SESSION UNTUK MENAMPILKAN ALERT NOTIFIKASI
        session()->flash('message', $this->id ? $this->nama . ' Diperbaharui': $this->nama . ' Ditambahkan');
        $this->closeModal(); //TUTUP MODAL
        $this->resetFields(); //DAN BERSIHKAN FIELD
    }

    //FUNGSI INI UNTUK MENGAMBIL DATA DARI DATABASE BERDASARKAN ID MEMBER
    public function edit($id)
    {
        $daftar = Daftar::find($id); //BUAT QUERY UTK PENGAMBILAN DATA
        //LALU ASSIGN KE DALAM MASING-MASING PROPERTI DATANYA
        $this->daftar_id = $id;
        $this->nama = $daftar->nama;
        $this->nik = $daftar->nik;
        $this->nohp = $daftar->nohp;

        $this->openModal(); //LALU BUKA MODAL
    }

    //FUNGSI INI UNTUK MENGHAPUS DATA
    public function delete($id)
    {
        $daftar = Daftar::find($id); //BUAT QUERY UNTUK MENGAMBIL DATA BERDASARKAN ID
        $daftar->delete(); //LALU HAPUS DATA
        session()->flash('message', $daftar->nama . ' Dihapus'); //DAN BUAT FLASH MESSAGE UNTUK NOTIFIKASI
    }
}
