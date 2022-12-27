<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'totalBonus',
        'percentage',
        'percentage2',
        'percentage3',
        'payment',
        'payment2',
        'payment3',
    ];
}