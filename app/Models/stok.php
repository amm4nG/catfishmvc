<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stok extends Model
{
    use HasFactory;
    protected $table = 'stok';
    public $timestamps = false; 
    protected $fillable = [
        'jumlah',
        'persentase',
        'min',
        'max'
    ];
}
