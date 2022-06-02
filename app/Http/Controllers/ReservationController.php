<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReservationCollection;
use App\Http\Resources\ReservationResource;
use App\Models\Flight;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Reservation $reservation
     * @return array
     */
    public function index(Reservation $reservation)
    {
        return new ReservationCollection($reservation->all());
    }

    public function show(Reservation $reservation)
    {
        return new ReservationResource($reservation);
    }

    public function store(Request $request)
    {
        $reservation = Reservation::create($request->all());

        return new ReservationResource($reservation);
    }

    public function update(Request $request, Reservation $reservation)
    {
        $reservation->update($request->all());

        return response()->json($reservation, 200);
    }

    public function destroy(Reservation $reservation)
    {
        if ($reservation->first()) {
            $reservation->delete();
        }

        return response()->json(['data' => 'Resource has been deleted']);
    }
}
