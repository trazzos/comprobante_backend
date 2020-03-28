<?php

use Illuminate\Database\Seeder;
use Modules\User\Database\Seeders\DatabaseSeeder as UserDatabaseSeeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        $this->call(UserDatabaseSeeder::class);
    }
}
