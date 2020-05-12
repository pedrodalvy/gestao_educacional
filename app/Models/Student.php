<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function user()
    {
        return $this->morphOne(\App\User::class, 'userable');
    }

    public function classInformations(){
        return $this->belongsToMany(ClassInformation::class);
    }
}
