<?php
use Modules\Company\Models\Company;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'rfc' => $faker->name,
    ];
});

$factory->state(Company::class, 'unit', [
    'id' => '11',
]);
