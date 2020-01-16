<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = 'reservations';
    protected $fillable = ['startDate',
        'endDate',
        'startTime',
        'endTime',
        'regNo',
        'priceCharged',
        'car_park_id',
        'parking_space_id',
        'user_id'];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function parkingSpace()
    {
        return $this->belongsTo('App\ParkingSpace');
    }
}
