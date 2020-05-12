<?php

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
        factory(\App\Models\ClassInformation::class, 20)->create();
    }
}
