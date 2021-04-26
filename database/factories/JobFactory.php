<?php
namespace Database\Factories;
/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Job;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;



$factory->define(Job::class, function (Faker $faker) {
    return [
        'titre' => $faker->titre,
        'description' => $faker->description,
        'salaire' => $faker->salaire,
        'end_date' => $faker->end_date,   
        
    ];
});

