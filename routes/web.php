<?php
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::view('/welcome', 'welcome');
