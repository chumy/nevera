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

$factory->define(Nevera\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'username' => $faker->unique()->userName,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt(str_random(10)),
        'role' => 'user',
        'active' => $faker->boolean,
        'remember_token' => str_random(10),
    ];
});

$factory->define(Nevera\Receta::class, function (Faker\Generator $faker) {

    return [
        'nombre' => $faker->name,
        'descripcion' =>$faker->paragraph,
        'duracion' => $faker->numberBetween(1,180),
        'dificultad' => $faker->numberBetween(0,5),
        'personas' => $faker->randomDigitNotNull,
        'fuente' => $faker->url,
        'valoracion'=> $faker-> numberBetween(0,5),
        'categoria_id'=> Nevera\Categoria::all()->random()->id,
        'user_id'=> Nevera\User::all()->random()->id,
    ];
});

$factory->define(Nevera\Paso::class, function (Faker\Generator $faker) {

    return [
        'descripcion' =>$faker->paragraph,
        'orden'=>1,
        'receta_id'=>1,
    ];
});

$factory->define(Nevera\Ingrediente::class, function (Faker\Generator $faker) {

    return [
        'nombre' =>$faker->name,
    ];
});

$factory->define(Nevera\ListadoIngredientes::class, function (Faker\Generator $faker) {

    return [
        'cantidad' => $faker->numberBetween(1,180),
        'medida' => $faker->name,
        'receta_id'=> Nevera\Receta::all()->random()->id,
        'ingrediente_id'=> Nevera\Ingrediente::all()->random()->id,
    ];
});
