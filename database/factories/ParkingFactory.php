<?php

use Faker\Generator as Faker;

$factory->define(App\Parking::class, function (Faker $faker) {
    return [
      'location' => $faker->city,
      'address' => $faker->address,
      'photo'=>'/storage/noimage.png',
    ];
});
