<?php

namespace Tests;

use Illuminate\Contracts\Console\Kernel;
use Faker\Generator;

trait CreatesApplication {
    use ChecksTestEnvironment;

    protected Generator $faker;

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication() {
        //TODO un unit test no debe de hacer un hit a la database. Pero esto aun genera
        //Algunos detalles. Checar de nuevo.
        //Usar el lazy eager load crea algunos detalles IE $response->load('branch');
        //$this->checkTestEnvironment();
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

        //Helper classes used in several unit and integration tests
        $this->faker = $app->make(Generator::class);

        return $app;
    }
}
