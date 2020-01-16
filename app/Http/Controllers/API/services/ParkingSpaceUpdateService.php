<?php

namespace App\Http\Controllers;

use App\ParkingSpace;

class ParkingSpaceUpdateService
{
    /**
     * Update the specified resource.
     *
     * @param $id
     * @return string
     */
    public function updateParkingSpace($id)
    {
        $parkingSpace = ParkingSpace::find($id);
        if ($parkingSpace->status === 'busy') {
            $parkingSpace->status = "available";
            $parkingSpace->save();
        } else {
            $parkingSpace->status = "busy";
            $parkingSpace->save();
        }
        return $parkingSpace;
    }
}