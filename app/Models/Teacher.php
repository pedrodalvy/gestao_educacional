<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Teacher
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ClassInformation[] $classInformations
 * @property-read int|null $class_informations_count
 * @property-read \App\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Teacher newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Teacher newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Teacher query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Teacher whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Teacher whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Teacher whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
