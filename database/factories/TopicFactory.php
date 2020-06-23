<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Topic;
use Faker\Generator as Faker;

$factory->define(Topic::class, function (Faker $faker) {

    return [
        'chapter_id' => $faker->randomDigitNotNull,
        'image' => $faker->word,
        'topic_name' => $faker->word,
        'created_by' => $faker->word,
        'short_description' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
