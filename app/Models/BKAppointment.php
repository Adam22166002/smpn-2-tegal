<?php
// app/Models/BKAppointment.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BKAppointment extends Model
{
    use HasFactory;

    protected $table = 'bk_appointments';

    protected $fillable = [
        'type',
        'name',
        'class_id',
        'phone',
        'email',
        'appointment_date',
        'appointment_time',
        'consultation_topic',
        'description',
        'counselor_id',
        'platform',
        'status',
        'meeting_link'
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'class_id');
    }

    public function counselor()
    {
        return $this->belongsTo(User::class, 'counselor_id');
    }
}