<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_locations', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('project_id', false, true);
			$table->string('latitude', 127);
            $table->string('longitude', 127);
            $table->string('name', 127);
            $table->boolean('status')->default(1);
            $table->timestamps();
			
			$table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_locations');
    }
}
