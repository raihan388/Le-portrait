<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    protected $table = 'order';

    protected $fillable = [
        'items', 
        'email', 
        'first_name', 
        'last_name', 
        'address', 
        'phone', 
        'notes', 
        'total', 
    ];

    protected $casts = [
        'items' => 'array',
    ];
}
