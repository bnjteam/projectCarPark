<?php

use Illuminate\Database\Seeder;

class MapsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $mapArray = [ ['1A','1'],
                    ['2A','1'],
                    ['3A','1'],
                    ['4A','1'],
                    ['5A','1'],
                    ['6A','1'],
                    ['2A','1'],
                    ['2A','1'],
                    ['9A','1'],
                    ['10A','1'],
                    ['11A','1'],
                    ['12A','1'],
                    ['13A','1'],
                    ['14A','1'],
                    ['15A','1'],
                    ['16A','1'],
                    ['17A','1'],
                    ['18A','1'],
                    ['19A','1'],
                    ['20A','1'],
                    ['1B','2'],
                    ['2B','2'],
                    ['3B','2'],
                    ['4B','2'],
                    ['5B','2'],
    ];
    for ($i=0; $i <count($mapArray) ; $i++) {
      $map = new App\Map;
      // dd($mapArray[$i]);
      $map->number = $mapArray[$i][0];
      $map->id_photo = $mapArray[$i][1];
      $map->save();
    }
    for ($i=0; $i <count($mapArray) ; $i++) {
      $map = new App\Map;
      // dd($mapArray[$i]);
      $map->number = $mapArray[$i][0];
      $map->id_photo = 3;
      $map->save();
    }

    for ($i=0; $i <count($mapArray) ; $i++) {
      $map = new App\Map;
      // dd($mapArray[$i]);
      $map->number = $mapArray[$i][0];
      $map->id_photo = 4;
      $map->save();
    }



    }
}
