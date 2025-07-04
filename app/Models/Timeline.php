<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Timeline extends Model
{
    protected $fillable = [
        'event',
        'operation',
    ];

    const UPDATED_AT = null;
}
