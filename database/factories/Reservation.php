<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Reservation;
use Faker\Generator as Faker;

$factory->define(Reservation::class, function (Faker $faker) use ($factory)  {

    return [
        'passenger_phone' => rand(600000000, 699999999),
        'passenger_passport' => rand(10000000, 99999999) . strtoupper(Str::random(1)),
        'reservation_code' => Str::random(10),
        'seat' => $faker->numberBetween(1,23) . strtoupper($faker->randomElement(['A', 'B', 'C', 'D', 'E', 'F'])) 

    ];
});


