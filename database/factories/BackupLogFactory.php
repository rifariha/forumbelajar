<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\BackupLog;
use Faker\Generator as Faker;

$factory->define(BackupLog::class, function (Faker $faker) {

    return [
        'topic_id' => $faker->randomDigitNotNull,
        'status' => $faker->word,
        'created_by' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
