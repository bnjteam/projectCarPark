<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $admin = new App\User;
      $admin ->name ='Administrator';
      $admin->email = 'admin@hotmail.com';
      $admin ->password=bcrypt('aadmin');
      $admin->level='admin';
      $admin->type='none';
      $admin->remember_token='';
      $admin->is_enabled=true;
      $admin->avatar='';
      $admin->save();
    }
}
