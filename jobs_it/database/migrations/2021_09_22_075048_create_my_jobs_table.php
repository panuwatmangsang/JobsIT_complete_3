<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_jobs', function (Blueprint $table) {
            $table->increments('myjobs_id');
            $table->integer('history_id');
            $table->string('action_type');
            $table->string('user_id');
            $table->string('a_id');
            $table->string('myjobs_name_company');
            $table->string('myjobs_logo');
            $table->string('myjobs_name');
            $table->string('myjobs_quantity');
            $table->string('myjobs_salary');
            $table->string('myjobs_type');
            $table->string('myjobs_location_work');
            $table->string('myjobs_start_post');
            $table->string('myjobs_stop_post');
            $table->string('myjobs_detail');
            $table->string('myjobs_contact');
            $table->string('myjobs_address');
            $table->string('myjobs_lat');
            $table->string('myjobs_lng');
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
        Schema::dropIfExists('my_jobs');
    }
}
