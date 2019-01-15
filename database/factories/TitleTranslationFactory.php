<?php

use Faker\Generator as Faker;

$factory->define(App\TitleTranslation::class, function (Faker $faker) {
    return [
        'text' => $faker->title(),
        'lang_id' => 1,
    ];
});
