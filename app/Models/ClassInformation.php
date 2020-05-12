<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassInformation extends Model
{
    protected $fillable = [
        'date_start',
        'date_end',
        'cycle',
        'subdivision',
        'semester',
        'year'
    ];

    protected $dates = [
        'date_start',
        'date_end',
    ];
}
