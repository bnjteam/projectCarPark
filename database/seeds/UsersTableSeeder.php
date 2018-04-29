<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
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
      $admin ->lastname ='Park';
      $admin->email = 'parkservice1@hotmail.com';
      $admin ->password=bcrypt('parkservice1');
      $admin->level='admin';
      $admin->type='none';
      $admin->remember_token= str_random(64);
      $admin->is_enabled=true;
      $admin->avatar='/storage/photos/avatar123.png';
      $admin->save();

      $admin = new App\User;
      $admin ->name ='guestAdmin';
      $admin ->lastname ='Lee';
      $admin->email = 'guestAdmin@hotmail.com';
      $admin ->password=bcrypt('guestAdmin');
      $admin->level='guest';
      $admin->type='none';
      $admin->remember_token= str_random(64);
      $admin->is_enabled=true;
      $admin->avatar='/storage/photos/avatar123.png';
      $admin->save();

      $admin = new App\User;
      $admin ->name ='guest';
      $admin ->lastname ='John';
      $admin->email = 'guest@hotmail.com';
      $admin ->password=bcrypt('guest');
      $admin->level='guest';
      $admin->type='none';
      $admin->remember_token= str_random(64);
      $admin->is_enabled=true;
      $admin->avatar='/storage/photos/avatar123.png';
      $admin->save();

      $admin = new App\User;
      $admin ->name ='member';
      $admin ->lastname ='Noel';
      $admin->email = 'member@hotmail.com';
      $admin ->password=bcrypt('member');
      $admin->level='member';
      $admin->type='monthly';
      $admin->start_date_package=Carbon::now()->toDateTimeString();
      $admin->end_date_package=Carbon::now()->addDay(1)->toDateTimeString();
      $admin->remember_token= str_random(64);
      $admin->is_enabled=true;
      $admin->avatar='/storage/photos/avatar123.png';
      $admin->save();

      $admin = new App\User;
      $admin ->name ='parking_owner';
      $admin ->lastname ='Boss';
      $admin->email = 'parking_owner@hotmail.com';
      $admin ->password=bcrypt('parking_owner');
      $admin->level='parking_owner';
      $admin->type='small';
      $admin->start_date_package=Carbon::now()->toDateTimeString();
      $admin->end_date_package=Carbon::now()->addMonths(4)->toDateTimeString();
      $admin->remember_token= str_random(64);
      $admin->is_enabled=true;
      $admin->avatar='/storage/photos/avatar123.png';
      $admin->save();

      $admin = new App\User;
      $admin ->name ='Master';
      $admin ->lastname ='ballstep';
      $admin->email = 'ball@hotmail.com';
      $admin ->password=bcrypt('123456');
      $admin->level='member';
      $admin->type='weekly';
      $admin->start_date_package=Carbon::now()->toDateTimeString();
      $admin->end_date_package=Carbon::now()->addDays(1)->toDateTimeString();
      $admin->remember_token= str_random(64);
      $admin->is_enabled=true;
      $admin->avatar='/storage/photos/avatar123.png';
      $admin->save();

      $admin = new App\User;
      $admin ->name ='Patchara';
      $admin ->lastname ='pin';
      $admin->email = 'test1@hotmail.com';
      $admin ->password=bcrypt('123456');
      $admin->level='member';
      $admin->type='weekly';
      $admin->start_date_package=Carbon::now()->toDateTimeString();
      $admin->end_date_package=Carbon::now()->addDays(1)->toDateTimeString();
      $admin->remember_token= str_random(64);
      $admin->is_enabled=true;
      $admin->avatar='/storage/photos/avatar123.png';
      $admin->save();

      $admin = new App\User;
      $admin ->name ='Dek';
      $admin ->lastname ='D';
      $admin->email = 'test2@hotmail.com';
      $admin ->password=bcrypt('123456');
      $admin->level='member';
      $admin->type='weekly';
      $admin->start_date_package=Carbon::now()->toDateTimeString();
      $admin->end_date_package=Carbon::now()->addDays(1)->toDateTimeString();
      $admin->remember_token= str_random(64);
      $admin->is_enabled=true;
      $admin->avatar='/storage/photos/avatar123.png';
      $admin->save();

      $admin = new App\User;
      $admin ->name ='P';
      $admin ->lastname ='Laou';
      $admin->email = 'test3@hotmail.com';
      $admin ->password=bcrypt('123456');
      $admin->level='member';
      $admin->type='weekly';
      $admin->start_date_package=Carbon::now()->toDateTimeString();
      $admin->end_date_package=Carbon::now()->addDays(1)->toDateTimeString();
      $admin->remember_token= str_random(64);
      $admin->is_enabled=true;
      $admin->avatar='/storage/photos/avatar123.png';
      $admin->save();

      $admin = new App\User;
      $admin ->name ='A';
      $admin ->lastname ='type';
      $admin->email = 'test4@hotmail.com';
      $admin ->password=bcrypt('123456');
      $admin->level='member';
      $admin->type='weekly';
      $admin->start_date_package=Carbon::now()->toDateTimeString();
      $admin->end_date_package=Carbon::now()->addDays(1)->toDateTimeString();
      $admin->remember_token= str_random(64);
      $admin->is_enabled=true;
      $admin->avatar='/storage/photos/avatar123.png';
      $admin->save();

      $admin = new App\User;
      $admin ->name ='Bomb';
      $admin ->lastname ='Mask';
      $admin->email = 'test5@hotmail.com';
      $admin ->password=bcrypt('123456');
      $admin->level='member';
      $admin->type='weekly';
      $admin->start_date_package=Carbon::now()->toDateTimeString();
      $admin->end_date_package=Carbon::now()->addDays(1)->toDateTimeString();
      $admin->remember_token= str_random(64);
      $admin->is_enabled=true;
      $admin->avatar='/storage/photos/avatar123.png';
      $admin->save();




    }
}
