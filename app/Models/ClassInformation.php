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

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }

    public function teachings()
    {
        return $this->hasMany(ClassTeaching::class);
    }
}
