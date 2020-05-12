<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        'enrolment' => Str::random(6),
    ];
});

$factory->define(\App\Models\UserProfile::class, function (Faker $faker) {
    return [
        'address' => $faker->address,
        'cep' => function () use ($faker) {
            return preg_replace('/[^0-9]/', '', $faker->postcode());
        },
        'number' => rand(1, 100),
        'complement' => rand(1, 10) % 2 == 0 ? null : $faker->sentence,
        'city' => $faker->city,
        'neighborhood' => $faker->city,
        'state' => collect(\App\Models\State::$states)->random(),
    ];
});

$factory->define(\App\Models\Subject::class, function (Faker $faker) {
    return ['name' => $faker->word];
});

$factory->define(\App\Models\ClassInformation::class, function (Faker $faker) {
    return [
        'date_start' => $faker->date(),
        'date_end' => $faker->date(),
        'cycle' => rand(1, 8),
        'subdivision' => $faker->randomLetter,
        'semester' => rand(1, 2),
        'year' => rand(2020, 2030),
    ];
});