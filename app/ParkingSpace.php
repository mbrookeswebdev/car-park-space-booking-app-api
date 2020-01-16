<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParkingSpace extends Model
{
    protected $table = 'parkingSpaces';
    protected $fillable = ['ref', 'status', 'car_park_id'];
    public $timestamps = false;

    public function carPark()
    {
        return $this->belongsTo('App\CarPark');
    }

    public function reservations()
    {
        return $this->hasMany('App\Reservations');
    }
}
