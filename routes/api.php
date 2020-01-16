<?php

use Illuminate\Support\Facades\Route;

//check if User is authorised to log in
Route::post('/login', 'LoginController@login')->middleware('cors');
// Show and update user's details
Route::apiResource('/users', 'API\UsersController')->middleware('cors');
// Create and update reservations
Route::apiResource('/reservations', 'API\ReservationsController')->middleware('cors');
// Show reservations in progress
Route::get('/reservations/check/{id}', 'API\ReservationsController@showIncompleteReservation')->middleware('cors');
// Show car parks
Route::apiResource('/carparks', 'API\CarParksController')->middleware('cors');