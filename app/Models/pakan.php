<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pakan extends Model
{
    use HasFactory;
    protected $table = 'pakan';
    public $timestamps = false; 
    protected $fillable = [
        'pakan',
        'tanggal'
    ];
}
