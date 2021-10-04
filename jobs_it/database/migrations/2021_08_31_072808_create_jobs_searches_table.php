<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsSearchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs_searches', function (Blueprint $table) {
            $table->increments('jobs_id');
            $table->string('user_id')->default('all');
            $table->string('a_id')->default('1');
            $table->string('jobs_name_company');
            $table->string('logo');
            $table->string('jobs_name');
            $table->string('jobs_quantity');
            $table->string('jobs_salary');
            $table->string('jobs_type');
            $table->string('location_work');
            $table->string('start_post');
            $table->string('stop_post');
            $table->string('jobs_detail');
            $table->string('jobs_contact');
            $table->string('jobs_address');
            $table->string('lat');
            $table->string('lng');
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
        Schema::dropIfExists('jobs_searches');
    }
}
