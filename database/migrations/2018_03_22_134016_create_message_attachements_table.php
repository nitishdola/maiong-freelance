<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessageAttachementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('message_attachements', function (Blueprint $table) {
            $table->increments('id');

            $table->increments('id');
			      $table->integer('message_id', false, true);
			      $table->string('file_path', 255);
            $table->boolean('status')->default(1);
            $table->timestamps();

			     $table->foreign('message_id')->references('id')->on('messages')->onDelete('cascade');

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
        Schema::dropIfExists('message_attachements');
    }
}
