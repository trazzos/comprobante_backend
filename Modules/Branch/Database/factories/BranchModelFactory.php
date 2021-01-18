<?php
use Modules\Branch\Models\Branch;
use Faker\Generator as Faker;

$factory->define(Branch::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});

$factory->state(Branch::class, 'unit', [
    'id' => '1',
]);
