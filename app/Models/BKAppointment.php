<?php
// app/Models/BKAppointment.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BKAppointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'kelas',
        'email',
        'phone',
        'appointment_date',
        'appointment_time',
        'consultation_topic',
        'deskripsi',
        'type', // online/offline
        'platform', // untuk online
        'counselor_id', // untuk offline
        'status'
    ];

    protected $casts = [
        'appointment_date' => 'date',
    ];
}