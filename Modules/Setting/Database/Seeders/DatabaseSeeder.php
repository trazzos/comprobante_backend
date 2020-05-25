<?php
namespace Modules\Setting\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $invoiceType =  \Config::get('catalogue.invoice_type');
        foreach($invoiceType as $key=> $var) {
            DB::table('invoice_type')->insert([
                'name' => $var['name'],
                'type' => $var['type'],
                'created_at' => Carbon::now('UTC'),
                'updated_at' => Carbon::now('UTC')
            ]);
        }

    }
}
