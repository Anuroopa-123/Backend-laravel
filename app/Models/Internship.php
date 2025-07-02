<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Internship extends Model
{
    protected $fillable = [
        'fullName',
        'email',
        'contactNumber',
        'collegeName',
        'startDate',
        'endDate',
        'duration',
        'course',
        'referredBy'
    ];
}
