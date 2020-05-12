<?php

use App\Models\ClassInformation;
use App\Models\Student;
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

        factory(ClassInformation::class, 50)
            ->create()
            ->each(function (ClassInformation $model) use ($students) {
                $studentsCollection = $students->random(10);
                $model->students()->attach($studentsCollection->pluck('id'));
            });
    }
}
