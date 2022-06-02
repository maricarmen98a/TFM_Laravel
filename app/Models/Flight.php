<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon; 
class Flight extends Model
{
    use HasFactory;
 
    protected $fillable = [
        'flight_number',
        'airline',
        'origin',
        'destination',
        'boarding_time', 
        'arrival_time',
        'boarding_hour',
        'arrival_hour',
        'reservation_code'
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
   
    public function city() {
        return $this->hasMany(City::class);
    } 
     public function Reservation() {
        return $this->hasMany('App\Models\Reservation');
    } 
}
