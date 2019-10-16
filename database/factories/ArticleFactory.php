<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    $date_time = $faker->dateTime;
    return [
        //
        'content' => $faker->text(),
        'user_id' => mt_rand(1, 3),
        'created_at' => $date_time,
        'updated_at' => $date_time
    ];
});
