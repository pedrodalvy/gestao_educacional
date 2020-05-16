<?php

use App\Models\ClassInformation;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Database\Seeder;

class ClassInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $students = Student::all();
        $teachers = Teacher::all();
        $subjects = Subject::all();

        factory(ClassInformation::class, 50)
            ->create()
            ->each(function (ClassInformation $model) use ($students, $teachers, $subjects) {
                $studentsCollection = $students->random(10);
                $model->students()->attach($studentsCollection->pluck('id'));

                $teaching = rand(3, 6);

                $teachersCollection = $teachers->random($teaching);
                $subjectsCollection = $subjects->random($teaching);
                foreach (range(1, $teaching) as $value) {
                    $model->teachings()->create([
                        'subject_id' => $subjectsCollection->get($value - 1)->id,
                        'teacher_id' => $teachersCollection->get($value - 1)->id,
                    ]);
                }
            });
    }
}
