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

use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(St\Models\User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(St\Models\Service::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'desc' => $faker->sentence(4),
        'keywords' => $faker->sentence(4),
        'text' => $faker->paragraph(),
        'img' => $faker->imageUrl(600, 500),
    ];
});


$factory->define(St\Models\Stock::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'text' => $faker->paragraph()
    ];
});

$factory->define(St\Models\Blog::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'desc' => $faker->paragraph(),
        'keywords' => $faker->sentence(4),
        'img_main' => $faker->imageUrl(600, 500),
        'text' => $faker->paragraph(),
    ];
});

$factory->define(St\Models\Image::class, function (Faker $faker) {
    return [
        'file_name' => $faker->imageUrl(300, 200),
        'blog_id' => function () {
            return factory(St\Models\Blog::class)->create()->id;
        }
    ];
});