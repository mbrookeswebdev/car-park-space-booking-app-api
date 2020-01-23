<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\CarPark;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CarParksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = CarPark::with('parkingSpaces')->get();
        if ($results) {
            return response($results, RESPONSE::HTTP_OK);
        } else {
            return response(RESPONSE::HTTP_NOT_FOUND);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newCarPark = new CarPark();
        $newCarPark->name = $request->input('name');
        $newCarPark->address = $request->input('address');
        $newCarPark->postcode = $request->input('postcode');
        $newCarPark->priceToCharge = $request->input('priceToCharge');
        $newCarPark->save();
        if ($newCarPark) {
            return response($newCarPark, RESPONSE::HTTP_CREATED);
        } else {
            return response(RESPONSE::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($postcode)
    {
        $carparks = CarPark::where('postcode', $postcode)->with('parkingSpaces')->get();
        if (count($carparks) > 0) {
            return response($carparks);
        } else {
            return response('', response::HTTP_NOT_FOUND);
        }
    }
}

