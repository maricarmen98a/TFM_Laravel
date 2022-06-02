<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
namespace Database\Factories;
use App\Models\Flight;
use App\Models\City;
use App\Models\Reservation;
use DateInterval;
use DateTime;
use Carbon\Carbon;

use Faker\Generator as Faker;
use Illuminate\Support\Str;

$city = new \App\Models\City;

$factory->define(Flight::class, function (Faker $faker) use ($city) {

    $origin = $faker->randomElement($city->airports);
    $destination = $faker->randomElement(array_diff($city->airports, [$origin]));
    $arrival = $faker->dateTimeBetween('0 week', '+10 week'); 
    $depart = clone $arrival;
    $hourBoarding = $faker->dateTimeBetween('9:00:00', '21:00:00')->format('H:i'); 
    $hourArrival = $faker->dateTimeBetween( $hourBoarding , '23:00:00')->format('H:i'); 

    return [
        'flight_number' => $faker->numberBetween(150, 1500),
        'airline' =>  'Aer Iolar',
        'origin' => $origin,
        'destination' => $destination,
        'price' => $faker->randomFloat(2, 90, 500),
        'boarding_time' => $depart,
        'arrival_time' => $arrival,
        'boarding_hour' => $hourBoarding,
        'arrival_hour' =>  $hourArrival,
        'reservation_code' => Str::random(10), 
    ];
});
