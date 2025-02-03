<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BKComplaint extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'kelas',
        'tipe_masalah',
        'deskripsi',
        'tingkat_urgency',
        'status'
    ];
}