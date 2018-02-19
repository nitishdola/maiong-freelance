<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_locations', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_profile_id', false, true);
            $table->string('latitude', 127);
            $table->string('longitude', 127);
            $table->string('name', 127);
            $table->boolean('status')->default(1);
            $table->timestamps();

            $table->foreign('user_profile_id')->references('id')->on('user_profiles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profile_locations');
    }
}
