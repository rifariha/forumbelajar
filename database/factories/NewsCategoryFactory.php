<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\NewsCategory;
use Faker\Generator as Faker;

$factory->define(NewsCategory::class, function (Faker $faker) {

    return [
        'category_name' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
