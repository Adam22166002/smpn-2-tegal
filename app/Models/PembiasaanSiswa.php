<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembiasaanSiswa extends Model
{
    use HasFactory;
    protected $table = "pembiasaan_siswa";
    protected $fillable = ['judul', 'deskripsi'];
}
