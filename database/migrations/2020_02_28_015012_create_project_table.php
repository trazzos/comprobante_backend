<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('number')->unique();
            $table->string('name');
            $table->integer('company_id');
            $table->string('observations');
            $table->integer('execution_mode_id');
            $table->integer('resource_id');
            $table->integer('award_type');
            $table->integer('fund_id');
            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();
            $table->integer('fiscal_exercise');
            $table->integer('benefited_inhabitants');
            $table->string('goals');
            $table->string('unit_of_measurement');
            $table->integer('federal_resource');
            $table->integer('state_resource');
            $table->integer('municipal_resource');
            $table->integer('other_resources');
            $table->integer('beneficiary_contribution');
            $table->integer('total_budgeted_amount');
            $table->string('macro_location');
            $table->string('micro_location');
            $table->string('location');
            $table->string('address');
            $table->string('between_street');
            $table->string('and_street');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('who_elaborated');
            $table->string('position_elaborated');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project');
    }
}
