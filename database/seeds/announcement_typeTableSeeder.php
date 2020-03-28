<?php

use Illuminate\Database\Seeder;

class announcement_typeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            ['name' => 'ESTATAL'],
            ['name' => 'FEDERAL'],
            ['name' => 'MUNICIPAL'],
            ['name' => 'INTERNACIONAL']
        ];
 
        foreach ($types as $type)
            DB::table('announcement_type')->insert($type);
    }
}
