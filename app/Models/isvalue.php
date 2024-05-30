<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class isvalue extends Model
{
    protected $table = 'isvalue';
    public $timestamps = false; 
    protected $fillable = [
        'status',
    ];
}
