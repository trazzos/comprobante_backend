<?php

use Illuminate\Database\Seeder;
use Modules\Setting\Database\Seeders\DatabaseSeeder as AwardTypeDatabaseSeeder;

class AwardTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AwardTypeDatabaseSeeder::class);
    }
}
