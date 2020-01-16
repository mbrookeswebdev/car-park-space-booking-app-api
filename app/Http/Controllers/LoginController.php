<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User;

class LoginController extends Controller
{
    //very basic authentication system
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        $password = $request->input('password');

        if ($password === $user->password) {
            return response($user, response::HTTP_OK);
        }
        return response('User is not authorised', response::HTTP_UNAUTHORIZED);
    }
}
