<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Receta::class, function (Faker\Generator $faker) {

    return [
        'nombre' => $faker->name,
        'descripcion' =>$faker->paragraph,
        'duracion' => $faker->numberBetween(1,180),
        'dificultad' => $faker->numberBetween(0,5),
        'personas' => $faker->randomDigitNotNull,
        'fuente' => $faker->url,
        'valoracion'=> $faker-> numberBetween(0,5),
        'categoria_id'=>1,
        'user_id'=>1,
    ];
});

$factory->define(App\Paso::class, function (Faker\Generator $faker) {

    return [
        'descripcion' =>$faker->paragraph,
        'orden'=>1,
        'receta_id'=>1,
    ];
});
