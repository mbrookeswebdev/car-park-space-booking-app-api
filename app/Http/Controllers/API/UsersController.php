<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        if ($user) {
            return response($user, response::HTTP_OK);
        } else {
            return response('', response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $validatedData = $request->validate([
            'name' => 'string|required|max:255',
            'email' => 'string|required|max:255',
            'phone' => 'string|required|max:11',
            'vehicle_reg_no' => 'string|required|max:7'
        ]);

        if ($user && $validatedData) {
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->phone = $request->input('phone');
            $user->vehicle_reg_no = $request->input('vehicle_reg_no');
            $result = $user->save();
        } else {
            return response("Validation error", RESPONSE::HTTP_INTERNAL_SERVER_ERROR);
        }

        if ($result) {
            return response($user, RESPONSE::HTTP_OK);
        } else {
            return response("Please verify input details, information could not be updated.", RESPONSE::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
