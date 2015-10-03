<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Teacher::class, function ($faker) {
    return [
        'name' => $faker->name,
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'profession' => $faker->randomElement($array = array ('engineering','math','physics'))
    ];
});

$factory->define(App\Student::class, function ($faker) {
    return [
        'name' => $faker->name,
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'career' => $faker->randomElement($array = array ('engineering','math','physics'))
    ];
});

$factory->define(App\Course::class, function ($faker) {
    return [
        'title' => $faker->sentence(4),
        'description' => $faker->paragraph(4),
		'value' => $faker->numberBetween(1,4),
        'teacher_id' => mt_rand(1, 50)
    ];
});