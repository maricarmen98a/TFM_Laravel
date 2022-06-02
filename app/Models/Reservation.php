<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
      'user_id',
      'flight_id',
      'passenger_name',
      'passenger_email',
      'passenger_passport',
      'passenger_phone',
      'reservation_code',
      'origin',
      'destination',
      'airline',
      'seat',
      'price',
      'boarding_time', 
      'arrival_time',
      'boarding_hour',
      'arrival_hour',
    ];


    public function User() {
      return $this->belongsTo('App\User');
    }
    
   /*  public function getReservationCodeAttribute()
    {
      return $this->reservation_code;
    } */
}
