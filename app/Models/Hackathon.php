<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hackathon extends Model
{
    protected $fillable = [
        'title',
        'description',
        'date',
        'image',
        'is_published',
        'font_style',
    ];
}
