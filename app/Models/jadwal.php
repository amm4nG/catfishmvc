<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jadwal extends Model
{
    protected $table = 'jadwal';
    public $timestamps = false; 
    protected $fillable = [
        'waktu', 
        'durasi', 
        'tanggal', 
        'status',
    ];
}
