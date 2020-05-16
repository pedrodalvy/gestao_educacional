<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    public function user()
    {
        return $this->morphOne(\App\User::class, 'userable');
    }

    public function classInformations(){
        return $this->belongsToMany(ClassInformation::class);
    }

    public function toArray()
    {
        $data = parent::toArray();
        $this->user->makeHidden('userable_type', 'userable_id');
        $data['user'] = $this->user;
        return $data;
    }
}
