<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Company;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'logo' => null/*$faker->image('storage/app/public', 100, 100, null, false)*/,
        'website' => $faker->url
    ];
});
