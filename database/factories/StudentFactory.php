<?php

use App\Models\Student;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

$factory->define(Student::class, function (Faker $faker) {
    // Get a random user ID from the User model
    $userId = User::all()->random()->id;

    return [
        'user_id' => $userId, // Associate with a user
        'father_name' => $faker->firstNameMale,
        'father_last_name' => $faker->lastName,
        'father_job' => $faker->jobTitle,
        'father_phone' => $faker->phoneNumber,
        'mother_name' => $faker->firstNameFemale,
        'mother_last_name' => $faker->lastName,
        'mother_job' => $faker->jobTitle,
        'mother_phone' => $faker->phoneNumber,
        'student_name' => $faker->firstName,
        'student_last_name' => $faker->lastName,
        'student_phone' => $faker->phoneNumber,
        'student_grade' => $faker->randomElement(['A', 'B', 'C', 'D']),
        'student_birthdate' => $faker->date,
        'student_avatar' => null, // Optional avatar path
        'email' => $faker->unique()->safeEmail,
        'password' => Hash::make('password'), // Default password
        'is_active' => true,
    ];
});
