<?php

use App\CarPark;
use Illuminate\Database\Seeder;

class CarParkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carPark = new CarPark([
            'name' => 'Walnuts Car Park',
            'address' => 'Walnuts Road, Orpington, Kent',
            'postcode' => 'BR73GH',
            'priceToCharge' => 1.15]);
        $carPark->save();

        $carPark = new CarPark([
            'name' => 'High Street Car Park',
            'address' => 'High Street, Orpington, Kent',
            'postcode' => 'BR64TF',
            'priceToCharge' => 1.10]);
        $carPark->save();

        $carPark = new CarPark([
            'name' => 'Court Road Car Park',
            'address' => 'Court Road, Orpington, Kent',
            'postcode' => 'BR33BK',
            'priceToCharge' => 2.10]);
        $carPark->save();

        $carPark = new CarPark([
            'name' => 'Station Car Park',
            'address' => 'Station Road, Orpington, Kent',
            'postcode' => 'BR56DF',
            'priceToCharge' => 1.35]);
        $carPark->save();
    }
}
