<?php

use Illuminate\Database\Seeder;

class LogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $log = new App\Log();
        $log->id_user = 1;
        $log->description = "user 1 seed database 1";
        $log->save();


    }
}
