<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Kuota extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'tanggal', 'qty', 'sisa','aktif'
    ];

    // public function getTanggalAttribute(){
    //     return Carbon::parse($this->attributes['tanggal'])
    //     ->translatedFormat('l, d F Y');
    // }
}
