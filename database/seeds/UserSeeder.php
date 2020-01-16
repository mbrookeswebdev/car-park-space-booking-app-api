<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User([
            'name' => 'John Doe',
            'email' => 'john@johndoe.com',
            'phone' => '077912567322',
            'password' => 'test',
            'vehicle_reg_no' => 'GH68FGD']);
        $user->save();

        $user = new User([
            'name' => 'Paul Smith',
            'email' => 'paul@paulsmith.com',
            'phone' => '077912567322',
            'password' => 'test2',
            'vehicle_reg_no' => 'AVC3GHS']);
        $user->save();
    }
}