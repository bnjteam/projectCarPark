<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(ParkingsTableSeeder::class);
        $this->call(LogsTableSeeder::class);
        $this->call(PackagesTableSeeder::class);
        $this->call(PackageUsersTableSeeder::class);
        $this->call(PhotolocationsTableSeeder::class);
        $this->call(MapsTableSeeder::class);
        $this->call(CurrentMapsTableSeeder::class);
    }
}
