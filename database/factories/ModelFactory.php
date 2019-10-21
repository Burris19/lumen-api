<?php

use App\Models\Cellar;
use App\Models\Hall;
use App\Models\Rack;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cardex;

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

$factory->define(Cellar::class, function (Faker\Generator $faker) {
    return [
        'code'  => $faker->uuid,
        'name'  => $faker->company(),
        'address' => $faker->address(),
        'phone' => $faker->phoneNumber()
    ];
});

$factory->define(Hall::class, function (Faker\Generator $faker) {
    return [
        'code'  => $faker->uuid,
        'description' => $faker->paragraph(),
        'cellar_id' => Cellar::all()->random()->id,
    ];
});


$factory->define(Rack::class, function (Faker\Generator $faker) {
    return [
        'code'  => $faker->uuid,
        'description' => $faker->paragraph(),
        'hall_id' => Hall::all()->random()->id,
    ];
});

$factory->define(Product::class, function (Faker\Generator $faker) {
    return [
        'code'  => $faker->uuid,
        'name' => $faker->name,
        'description' => $faker->paragraph(),
        'cost_price' =>  $faker->unique()->randomDigit,
        'sale_price' => $faker->unique()->randomDigit,
        'category_id' => Category::all()->random()->id,
        'rack_id' => Rack::all()->random()->id
    ];
});

$factory->define(Cardex::class, function (Faker\Generator $faker) {
    $types = ['sale', 'buy', 'return', 'sample'];
    $action = ['entrada', 'salida'];
    return [
        'type' => array_rand($types, 1),
        'date_transaction' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+5 years'),
        'cellar_from_id' => Cellar::all()->random()->id,
        'cellar_to_id' =>  Cellar::all()->random()->id,
        'action' => array_rand($action, 1),
        'product_id' => Product::all()->random()->id
    ];
});
