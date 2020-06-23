<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Forum;
use Faker\Generator as Faker;

$factory->define(Forum::class, function (Faker $faker) {

    return [
        'topic_id' => $faker->randomDigitNotNull,
        'parent_id' => $faker->randomDigitNotNull,
        'user_id' => $faker->randomDigitNotNull,
        'comment' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
