<?php

use Illuminate\Support\Facades\Route;
use Faker\Factory as Faker;

Route::get('/', function () {
    return view('login');
});

Route::get("/home", function () {
    $contacts = [];
    $faker = Faker::create();
    for ($i = 1; $i <= 100; $i++) {
        $contacts[] = [
            'name' => $faker->name,
            'email' => $faker->unique()->safeEmail,
            'phone' => $faker->phoneNumber
        ];
    };

    $contacts_dosen = [];
    $faker = Faker::create();
    for ($i = 1; $i <= 100; $i++) {
        $contacts_dosen[] = [
            'name' => $faker->name,
            'email' => $faker->unique()->safeEmail,
            'phone' => $faker->phoneNumber
        ];
    };
    return view("homepage", ['contacts_dosen' => $contacts_dosen,
'contacts' => $contacts]);
});
