<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\ParkingSpace;
use Illuminate\Http\Response;

class ParkingSpacesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = ParkingSpace::all();

        if ($results) {
            return response($results, RESPONSE::HTTP_OK);
        } else {
            return response('', RESPONSE::HTTP_NOT_FOUND);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $results = ParkingSpace::where([
            ['car_park_id', '=', $id],
            ['status', 'available'],
        ])->get();

        if (count($results) > 0) {
            return response($results, RESPONSE::HTTP_OK);
        } else {
            return response('', RESPONSE::HTTP_NOT_FOUND);
        }
    }
}