<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ent__profiles', function (Blueprint $table) {
            $table->increments('profile_company_id');
            $table->string('profile_name_company');
            $table->string('profile_logo');
            $table->string('profile_company_contact');
            $table->string('profile_company_phone');
            $table->string('profile_email');
            $table->string('profile_company_address');
            $table->string('profile_lat');
            $table->string('profile_lng');
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
        Schema::dropIfExists('ent__profiles');
    }
}
