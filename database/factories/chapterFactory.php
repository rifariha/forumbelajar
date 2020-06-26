<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Chapter;
use Faker\Generator as Faker;

$factory->define(Chapter::class, function (Faker $faker) {

    return [
        'chapter_name' => $faker->word,
        'short_description' => $faker->word,
        'description' => $faker->text,
        'image' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
