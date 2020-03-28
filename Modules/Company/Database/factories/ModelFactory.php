<?php

use Modules\Company\Models\Company;

$factory->define(Company::class, function (Faker\Generator $faker) {
    return [];
});

$factory->defineAs(Company::class, 'unit', function (Faker\Generator $faker) {
    return [
        'id' => 1,
    ];
});
