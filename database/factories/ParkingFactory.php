<?php

use Faker\Generator as Faker;

$factory->define(App\Parking::class, function (Faker $faker) {
    return [
      'id_user'=> '1',
      'location' => $faker->city,
      'address' => $faker->address,
      'photo'=>'/storage/noimage.png',
    ];
});
