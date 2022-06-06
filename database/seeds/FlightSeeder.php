<?php

use Illuminate\Database\Seeder;
use App\Models\Flight;
use Carbon\Carbon;
use Faker\Generator as Faker;

class FlightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      \App\Models\Flight::factory()->count(8000)->create(); 

    }
       
    }

