<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BKComplaint extends Model
{
    use HasFactory;
    protected $table = 'bk_complaints';

    protected $fillable = [
        'name',
        'class_id',
        'problem_type',
        'description',
        'urgency',
        'status'
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'class_id');
    }
}