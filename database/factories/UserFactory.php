<?php

use Faker\Generator as Faker;

/*
  |--------------------------------------------------------------------------
  | Model Factories
  |--------------------------------------------------------------------------
  |
  | This directory should contain each of the model factory definitions for
  | your application. Factories provide a convenient way to generate new
  | model instances for testing / seeding your application's database.
  |
 */

//$factory->define(App\User::class, function (Faker $faker) {
//    return [
//        'name' => $faker->name,
//        'email' => $faker->unique()->safeEmail,
//        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
//        'remember_token' => str_random(10),
//    ];
//});

$factory->define(App\vision::class, function (Faker $faker) {
    return [
        'content' => str_random(55),
    ];
});

$factory->define(App\vote_me::class, function (Faker $faker) {
    $strings = array(
        'yes',
        'no',
    );
    $key = array_rand($strings);
    $value = $strings[$key];
    $strings2 = array(
        'Ikeja',
        'Alimosho',
        'Onigbongbo',
    );
    $key2 = array_rand($strings2);
    $value2 = $strings2[$key2];
    return [
        'user_id' => rand(1, 2),
        'value' => $value,
        'district' => $value2,
        'comment1' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'comment2' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'comment3' => $faker->sentence($nbWords = 6, $variableNbWords = true),
    ];
});
