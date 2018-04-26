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
      $admin ->name ='admin';
      $admin ->lastname ='JAYNAJA';
      $admin->email = 'parkservice1@hotmail.com';
      $admin ->password=bcrypt('parkservice1');
      $admin->level='admin';
      $admin->type='large';
      // $admin->start_date_package='';
      // $admin->end_date_package='';
      $admin->remember_token= str_random(64);
      $admin->is_enabled=true;
      $admin->avatar='/storage/photos/avatar123.png';
      $admin->save();

      $admin = new App\User;
      $admin ->name ='guestAdmin';
      $admin ->lastname ='guestAdmin';
      $admin->email = 'guestAdmin@hotmail.com';
      $admin ->password=bcrypt('guestAdmin');
      $admin->level='guest';
      $admin->type='none';
      // $admin->start_date_package='';
      // $admin->end_date_package='';
      $admin->remember_token= str_random(64);
      $admin->is_enabled=true;
      $admin->avatar='/storage/photos/avatar123.png';
      $admin->save();

      $admin = new App\User;
      $admin ->name ='guest';
      $admin ->lastname ='guest';
      $admin->email = 'guest@hotmail.com';
      $admin ->password=bcrypt('guest');
      $admin->level='guest';
      $admin->type='none';
      // $admin->start_date_package='';
      // $admin->end_date_package='';
      $admin->remember_token= str_random(64);
      $admin->is_enabled=true;
      $admin->avatar='/storage/photos/avatar123.png';
      $admin->save();

      $admin = new App\User;
      $admin ->name ='member';
      $admin ->lastname ='member';
      $admin->email = 'member@hotmail.com';
      $admin ->password=bcrypt('member');
      $admin->level='member';
      $admin->type='small';
      // $admin->start_date_package='';
      // $admin->end_date_package='';
      $admin->remember_token= str_random(64);
      $admin->is_enabled=true;
      $admin->avatar='/storage/photos/avatar123.png';
      $admin->save();

      $admin = new App\User;
      $admin ->name ='parking_owner';
      $admin ->lastname ='parking_owner';
      $admin->email = 'parking_owner@hotmail.com';
      $admin ->password=bcrypt('parking_owner');
      $admin->level='parking_owner';
      $admin->type='none';
      // $admin->start_date_package='';
      // $admin->end_date_package='';
      $admin->remember_token= str_random(64);
      $admin->is_enabled=true;
      $admin->avatar='/storage/photos/avatar123.png';
      $admin->save();
    }
}
