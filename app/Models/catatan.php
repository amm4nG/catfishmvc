<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class catatan extends Model
{
    protected $table = 'catatan';
    public $timestamps = false; 
    protected $fillable = [
        'waktu',
        'catatan',
    ];
}
