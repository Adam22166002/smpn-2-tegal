<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KegiatanSiswa extends Model
{
    use HasFactory;

    protected $table = 'kegiatan_siswas';

    protected $fillable = [
        'judul', 
        'deskripsi', 
        'gambar', 
        'tanggal'
    ];
}

