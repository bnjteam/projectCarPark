<?php

use Illuminate\Database\Seeder;

class PackagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $package = new App\Package();
        $package->name = 'none';
        $package->limit = 0;
        $package->price = 0;
        $package->save();

        $package = new App\Package();
        $package->name = 'small';
        $package->limit = 1;
        $package->price = 299.99;
        $package->save();

        $package = new App\Package();
        $package->name = 'medium';
        $package->limit = 2;
        $package->price = 599.99;
        $package->save();

        $package = new App\Package();
        $package->name = 'large';
        $package->limit = 5;
        $package->price = 999.99;
        $package->save();

        $package = new App\Package();
        $package->name = 'daily';
        $package->limit = 1;
        $package->price = 3.99;
        $package->save();

        $package = new App\Package();
        $package->name = 'weekly';
        $package->limit = 1;
        $package->price = 15.99;
        $package->save();

        $package = new App\Package();
        $package->name = 'monthly';
        $package->limit = 1;
        $package->price = 45.99;
        $package->save();
    }
}
