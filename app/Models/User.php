<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;
    protected $table = 'users';
    public $timestamps = false;
    // Tambahkan kolom yang bisa diisi
    protected $fillable = [
        'nama', 
        'alamat', 
        'email', 
        'username',
        'password',
        'foto',
    ];
}