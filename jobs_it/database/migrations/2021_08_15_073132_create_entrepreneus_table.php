<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntrepreneusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrepreneus', function (Blueprint $table) {
            $table->increments('ent_id');
            $table->text('ent_name');
            $table->text('ent_nature_work');
            $table->text('ent_name_contact');
            $table->text('ent_phone');
            $table->text('ent_email');
            $table->text('ent_password');
            $table->text('ent_location');
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
        Schema::dropIfExists('entrepreneus');
    }
}
