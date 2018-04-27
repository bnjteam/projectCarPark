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
        $package->save();

        $package = new App\Package();
        $package->name = 'small';
        $package->limit = 1;
        $package->save();

        $package = new App\Package();
        $package->name = 'medium';
        $package->limit = 2;
        $package->save();

        $package = new App\Package();
        $package->name = 'large';
        $package->limit = 5;
        $package->save();

        $package = new App\Package();
        $package->name = 'daily';
        $package->limit = 1;
        $package->save();

        $package = new App\Package();
        $package->name = 'weekly';
        $package->limit = 1;
        $package->save();

        $package = new App\Package();
        $package->name = 'monthly';
        $package->limit = 1;
        $package->save();
    }
}
