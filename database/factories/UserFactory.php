<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => Hash::Make('123456789'), // password
        'remember_token' => Str::random(10),
    ];
});



$factory->define(Post::class, function (Faker $faker) {
    return [
        'user_id' => rand(1,10),
        'text' => $faker->paragraph()->sentence,
        'title' => $faker->unique()->safeEmail,
    ];
});
