<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
namespace Database\Factories;
use App\Models\Flight;
use App\Models\City;
use App\Models\Reservation;
use DateInterval;
use DateTime;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Str;


class FlightFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Flight::class;
 
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
            $city = new \App\Models\City;
            $arrival = $this->faker->dateTimeBetween('0 week', '+10 week'); 
        
            return [
                'flight_number' => $this->faker->numberBetween(150, 1500),
                'airline' =>  'Aer Iolar',
                'origin' => $this->faker->randomElement($city->airports),
                'destination' => $this->faker->randomElement(array_diff($city->airports, ['origin'])),
                'price' => $this->faker->randomFloat(2, 90, 500),
                'arrival_time' => $arrival,
                'boarding_time' => clone $arrival,
                'boarding_hour' => $this->faker->dateTimeBetween('9:00:00', '21:00:00')->format('H:i'),
                'arrival_hour' =>  $this->faker->dateTimeBetween( 'boarding_hour' , '23:00:00')->format('H:i'),
            ];
        
    }

}


