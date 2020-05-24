<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ClassInformation
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon $date_start
 * @property \Illuminate\Support\Carbon $date_end
 * @property string $cycle
 * @property string|null $subdivision
 * @property int $semester
 * @property int $year
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Student[] $students
 * @property-read int|null $students_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ClassTeaching[] $teachings
 * @property-read int|null $teachings_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClassInformation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClassInformation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClassInformation query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClassInformation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClassInformation whereCycle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClassInformation whereDateEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClassInformation whereDateStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClassInformation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClassInformation whereSemester($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClassInformation whereSubdivision($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClassInformation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClassInformation whereYear($value)
 * @mixin \Eloquent
 */
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
