<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterMultipleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('branch', function (Blueprint $table) {
            $table->dropForeign('branch_user_id_foreign');
            $table->foreignId('user_id')
                ->after('zip_code')
                ->nullable()
                ->change()
                ->constrained('user');
        });
        Schema::table('user', function (Blueprint $table) {
            $table->foreignId('user_id')
                ->after('role')
                ->nullable()
                ->change()
                ->constrained('user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
