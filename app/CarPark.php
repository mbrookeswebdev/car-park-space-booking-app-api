<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarPark extends Model
{
    protected $table = 'carParks';
    protected $fillable = ['name', 'address', 'postcode', 'priceToCharge'];
    public $timestamps = false;

    public function parkingSpaces()
    {
        return $this->hasMany('App\ParkingSpace');
    }
}
