<?php

namespace App\Listeners;

use App\Events\UserCreated;
use App\Models\Flight;
use App\Models\FlightUser;
use App\Models\Reservation;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NewUserCreatesBookingReservation
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserCreated  $event
     * @return void
     */
    public function handle(UserCreated $event)
    {
        $flight = \App\Models\Flight::factory()->create([]);
        
        $reservation = \App\Models\Reservation::factory()->create([
            'user_id' => $event->user->id,
            'flight_id' => $flight->flight_number,
            'passenger_name' => $event->user->name,
            'passenger_email' => $event->user->email,
            'airline' => $flight->airline,
            'origin' => $flight->origin,
            'destination' => $flight->destination,
            'price' => $flight->price,
            'boarding_time' => $flight->boarding_time, 
            'arrival_time' => $flight->arrival_time, 
            'boarding_hour' => $flight->boarding_hour, 
            'arrival_hour' => $flight->arrival_hour,
 
        ]);
    }
}
