<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->increments('history_id');
            $table->string('name_prefix');
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string('email', 50);
            $table->string('phone_number', 10);
            $table->string('birthday');
            $table->integer('year_old');
            $table->string('profile');
            $table->string('university');
            $table->string('faculty');
            $table->string('branch');
            $table->string('gpa');
            $table->string('educational');
            $table->string('experience');
            $table->longText('dominant_language');
            $table->longText('language_learned');
            $table->longText('charisma');
            $table->string('portfolio');
            $table->string('name_village');
            $table->string('home_number');
            $table->string('alley');
            $table->string('road');
            $table->string('district');
            $table->string('canton');
            $table->string('province');
            $table->string('postal_code');
            $table->string('my_name_village');
            $table->string('my_home_number');
            $table->string('my_alley');
            $table->string('my_road');
            $table->string('my_district');
            $table->string('my_canton');
            $table->string('my_province');
            $table->string('my_postal_code');
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
        Schema::dropIfExists('histories');
    }
}
