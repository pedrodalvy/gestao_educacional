<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Student
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ClassInformation[] $classInformations
 * @property-read int|null $class_informations_count
 * @property-read \App\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Student newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Student newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Student query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Student whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Student whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Student whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Student extends Model
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
