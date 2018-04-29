<?php

use Illuminate\Database\Seeder;

class ParkingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $parking = new App\Parking;
        $parking->id_user = 5;
        $parking->location = 'The Mall Ngamwongwan';
        $parking->address = '30/39-50 M.2 Ngamwongwan Rd, Bangken,Nonthaburi, 11000';
        $parking->photo = '/storage/mall.png';
        $parking->save();
    }
}
