<?php

$factory->define(
    App\Task::class,
    function (Faker\Generator $faker) {
        return [
            'title' => $faker->sentence(5),
            'body' => $faker->sentence(15),
            'completed' => 0,
        ];
    }
);