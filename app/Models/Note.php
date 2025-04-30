<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    
    // Permite asignación masiva para estos campos
    protected $fillable = [
        'title',
        'author',
        'date_time',
        'body',
        'classification'
    ];
}