<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Reservation;
use App\Http\Controllers\ParkingSpaceUpdateService;

class ReservationsController extends Controller
{

    public function index()
    {
        $result = Reservation::all();
        if ($result) {
            return response($result, RESPONSE::HTTP_OK);
        } else {
            return response('', RESPONSE::HTTP_NOT_FOUND);
        }
    }

    public function store(Request $request)
    {
        $newReservation = new Reservation();
        $newReservation->startDate = $request->input('startDate');
        $newReservation->endDate = $request->input('endDate');
        $newReservation->startTime = $request->input('startTime');
        $newReservation->endTime = $request->input('endTime');
        $newReservation->parking_space_id = $request->input('parking_space_id');
        $newReservation->car_park_id = $request->input('car_park_id');
        $newReservation->user_id = $request->input('user_id');
        $newReservation->regNo = $request->input('regNo');
        $newReservation->priceCharged = $request->input('priceCharged');
        $newReservation->save();
        $updatePS = new ParkingSpaceUpdateService();
        $updatePS->updateParkingSpace($request->input('parking_space_id'));

        if ($newReservation) {
            return response($newReservation, RESPONSE::HTTP_CREATED);
        } else {
            return response('A new reservation could not be created.', RESPONSE::HTTP_BAD_REQUEST);
        }

    }


    public function show($id)
    {
        $results = Reservation::where([
            ['user_id', '=', $id],
        ])->get();

        if (count($results) > 0) {
            return response($results, RESPONSE::HTTP_OK);
        } else {
            return response('', RESPONSE::HTTP_NOT_FOUND);
        }
    }

    public function showIncompleteReservation($id)
    {
        $result = Reservation::where([
            ['user_id', '=', $id],
            ['endDate', '=', null]
        ])->get();

        if ($result) {
            return response($result, RESPONSE::HTTP_OK);
        } else {
            return response('', RESPONSE::HTTP_NOT_FOUND);
        }
    }

    public function update(Request $request)
    {
        $reservation = Reservation::find($request->input('id'));

        if ($reservation) {
            $reservation->endDate = $request->input('endDate');
            $reservation->endTime = $request->input('endTime');
            $reservation->priceCharged = $request->input('totalPrice');
            $reservation->save();

            $updatePS = new ParkingSpaceUpdateService();
            $updatePS->updateParkingSpace($reservation->parking_space_id);

            return response($reservation, RESPONSE::HTTP_OK);
        } else {
            return response("Reservation could not be updated.", response::HTTP_BAD_REQUEST);
        }
    }
}


