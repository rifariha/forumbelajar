<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Cms;
use Faker\Generator as Faker;

$factory->define(Cms::class, function (Faker $faker) {

    return [
        'cms_name' => $faker->word,
        'content' => $faker->text,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
