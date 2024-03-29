<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;    
    
    protected $fillable = ['number', 'date', 'items', 'totalAmount'];

    protected $casts = [
        'items' => 'array',
    ];
}
