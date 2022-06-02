<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
namespace Database\Factories;

use App\Models\Reservation;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ReservationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Reservation::class;
 
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'passenger_phone' => rand(600000000, 699999999),
            'passenger_passport' => rand(10000000, 99999999) . strtoupper(Str::random(1)),
            'reservation_code' => Str::random(10),
            'seat' => $this->faker->numberBetween(1,23) . strtoupper($this->faker->randomElement(['A', 'B', 'C', 'D', 'E', 'F'])) 
    
        ];

    }
}


