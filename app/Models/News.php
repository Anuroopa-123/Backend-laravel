<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'news_image',
        'description',
        'date',
        'is_published',
    ];
}
