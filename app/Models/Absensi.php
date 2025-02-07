<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $table = "absensi";
    protected $guarded = [];

    public $timestamps = false;

    public function users()
    {
        return $this->belongsTo(User::class, 'murid_id', 'id');
    }
}
