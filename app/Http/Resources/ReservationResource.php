<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReservationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
          'id' => $this->id,
          'passenger_name' => $this->passenger_name,
          'passenger_email' => $this->passenger_email,
          'passenger_phone' => $this->passenger_phone,
          'passenger_passport' => $this->passenger_passport,
          'reservation_code' => $this->reservation_code,
          'origin' => $this->origin,
          'destination' => $this->destination,
          'airline' => $this->airline,
          'seat' => $this->seat,
          'boarding_time' => $this->boarding_time,
          'arrival_time' => $this->arrival_time,
          'boarding_hour' => $this->boarding_hour,
          'arrival_hour' => $this->arrival_hour,
          'assigned_flight_id' => $this-> assigned_flight_id
        ];
    }
}
