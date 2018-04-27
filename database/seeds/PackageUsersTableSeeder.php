<?php

use Illuminate\Database\Seeder;

class PackageUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $p = new App\Package_user;
        $p->id_user = 5;
        $p->id_package = 2;
        $p->numbers = 0;
        $p->save();

        $p = new App\Package_user;
        $p->id_user = 1;
        $p->id_package = 4;
        $p->numbers = 10;
        $p->save();
    }
}
