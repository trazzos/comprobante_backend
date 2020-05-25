<?php

use Illuminate\Database\Seeder;
use Modules\User\Database\Seeders\DatabaseSeeder as UserDatabaseSeeder;
use Modules\Setting\Database\Seeders\DatabaseSeeder as SettingDatabaseSeeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        $this->call(UserDatabaseSeeder::class);
        $this->call(SettingDatabaseSeeder::class);
    }
}
