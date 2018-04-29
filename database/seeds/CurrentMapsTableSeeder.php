<?php

use Illuminate\Database\Seeder;

class CurrentMapsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $cur = new App\Current_map;
      $cur->id_user = 6;
      $cur->id_map = 7;
      $cur->password = 'FhqOSkCfdCPVtICtMpZYqyRZly8OO7vre5dzKv0QVzGeOykr9LT2fs1JBfXAV8Z2';
      $cur->status="empty";
      $cur->save();

      $cur = new App\Current_map;
      $cur->id_user = 7;
      $cur->id_map = 8;
      $cur->password = 'FhqOSkCfdCPVtICtMpZYqyRZly8OO7vre5dzKv0QVzGeOykr9LT2fs1JBfXAV8Z3';
      $cur->status="empty";
      $cur->save();

      $cur = new App\Current_map;
      $cur->id_user = 8;
      $cur->id_map = 9;
      $cur->password = 'FhqOSkCfdCPVtICtMpZYqyRZly8OO7vre5dzKv0QVzGeOykr9LT2fs1JBfXAV8Z4';
      $cur->status="empty";
      $cur->save();

      $cur = new App\Current_map;
      $cur->id_user = 9;
      $cur->id_map = 10;
      $cur->password = 'FhqOSkCfdCPVtICtMpZYqyRZly8OO7vre5dzKv0QVzGeOykr9LT2fs1JBfXAV8Z5';
      $cur->status="empty";
      $cur->save();

      $cur = new App\Current_map;
      $cur->id_user = 10;
      $cur->id_map = 1;
      $cur->password = 'FhqOSkCfdCPVtICtMpZYqyRZly8OO7vre5dzKv0QVzGeOykr9LT2fs1JBfXAV8Z6';
      $cur->status="empty";
      $cur->save();

      $cur = new App\Current_map;
      $cur->id_user = 11;
      $cur->id_map = 92;
      $cur->password = 'FhqOSkCfdCPVtICtMpZYqyRZly8OO7vre5dzKv0QVzGeOykr9LT2fs1JBfXAV8Z7';
      $cur->status="empty";
      $cur->save();
    }
}
