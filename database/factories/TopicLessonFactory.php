<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\TopicLesson;
use Faker\Generator as Faker;

$factory->define(TopicLesson::class, function (Faker $faker) {

    return [
        'topic_id' => $faker->randomDigitNotNull,
        'lesson' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
