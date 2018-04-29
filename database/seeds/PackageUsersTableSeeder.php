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
      $p->id_user = 4;
      $p->id_package = 7;
      $p->numbers = 0;
      $p->save();

        $p = new App\Package_user;
        $p->id_user = 5;
        $p->id_package = 4;
        $p->numbers = 5;
        $p->save();

        $p = new App\Package_user;
        $p->id_user = 6;
        $p->id_package = 6;
        $p->numbers = 1;
        $p->save();

        $p = new App\Package_user;
        $p->id_user = 7;
        $p->id_package = 6;
        $p->numbers = 1;
        $p->save();

        $p = new App\Package_user;
        $p->id_user = 8;
        $p->id_package = 6;
        $p->numbers = 1;
        $p->save();

        $p = new App\Package_user;
        $p->id_user = 9;
        $p->id_package = 6;
        $p->numbers = 1;
        $p->save();

        $p = new App\Package_user;
        $p->id_user = 10;
        $p->id_package = 6;
        $p->numbers = 1;
        $p->save();

        $p = new App\Package_user;
        $p->id_user = 11;
        $p->id_package = 6;
        $p->numbers = 1;
        $p->save();

        $p = new App\Package_user;
        $p->id_user = 12;
        $p->id_package = 4;
        $p->numbers = 5;
        $p->save();

        $p = new App\Package_user;
        $p->id_user = 13;
        $p->id_package = 4;
        $p->numbers = 2;
        $p->save();


    }
}
