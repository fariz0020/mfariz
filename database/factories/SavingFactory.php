<?php

use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(App\Saving::class, function (Faker $faker) {
    return [
        'no_saving' => $faker->numberBetween(11001100, 19999999),
        'balance' => 0,
        'id_user' => 1,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
    ];
});
