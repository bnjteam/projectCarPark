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
        $log->description = "admin has login";
        $log->save();

        $log = new App\Log();
        $log->id_user = 2;
        $log->description = "guest setting user";
        $log->save();
    }
}
