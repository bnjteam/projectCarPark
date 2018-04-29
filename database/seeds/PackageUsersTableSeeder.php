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
        $p->id_package = 2;
        $p->numbers = 1;
        $p->save();



        $p = new App\Package_user;
        $p->id_user = 6;
        $p->id_package = 6;
        $p->numbers = 1;
        $p->save();
    }
}
