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

$factory->define(Company\Divition::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->city
    ];
});


$factory->define(Company\Department::class, function (Faker\Generator $faker) {
    return [
        'section' => $faker->word,
        /*
         * Para que funcione hay que ejecutar la primera vez estas sentencia SQL: "ALTER TABLE company.divitions AUTO_INCREMENT = 1"
         * para de esta forma reiniciar el auto increment automatico de la BD. Luego que funcione la primera vez no fallaria mas.
         * Este metodo es sumamente util para las relaciones de 1 a mucho
        */
        'divition_id' => $faker->numberBetween(1,10)
    ];
});

$factory->define(Company\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(Company\Employee::class, function (Faker\Generator $faker) {
    return [
        'direction' => $faker->address,
        'expertise_area' => $faker->randomElement(['Back-End Developer', 'Front-End Developer', 'Marketing', 'Designer'])//Para que funcione hay que ejecutar antes la siguiente sentencia SQL: "ALTER TABLE company.divitions AUTO_INCREMENT = 1"
    ];
});



