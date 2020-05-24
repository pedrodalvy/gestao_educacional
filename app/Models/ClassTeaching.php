<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ClassTeaching
 *
 * @property int $id
 * @property int $subject_id
 * @property int $class_information_id
 * @property int $teacher_id
 * @property-read \App\Models\ClassInformation $classInformation
 * @property-read \App\Models\Subject $subject
 * @property-read \App\Models\Teacher $teacher
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClassTeaching newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClassTeaching newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClassTeaching query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClassTeaching whereClassInformationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClassTeaching whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClassTeaching whereSubjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClassTeaching whereTeacherId($value)
 * @mixin \Eloquent
 */
class ClassTeaching extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'subject_id',
        'class_information_id',
        'teacher_id',
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function classInformation()
    {
        return $this->belongsTo(ClassInformation::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function toArray()
    {
        $data = parent::toArray();

        $data['subject'] = $this->subject;
        $data['classInformation'] = $this->classInformation;
        $data['teacher'] = $this->teacher;

        return $data;
    }
}
