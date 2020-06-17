<?php

/** @var Factory $factory */

use App\Models\Season;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Season::class, function (Faker $faker) {
    return [
        'name' => 'Season 1',
    ];
});
