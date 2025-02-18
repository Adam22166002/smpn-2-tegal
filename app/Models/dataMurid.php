<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataMurid extends Model
{
    use HasFactory;

    protected $table = 'data_murids';
    protected $guarded = [];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
