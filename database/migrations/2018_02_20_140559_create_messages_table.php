<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sender_id', false, true);
            $table->integer('receiver_id', false, true);
            $table->integer('profile_id', false, true)->nullable();
            $table->string('subject', 255);
            $table->text('message');
            $table->dateTime('message_date');
            $table->integer('reply_to')->nullable()->comment('If replying to a message');
            $table->boolean('status')->default(1);
            $table->timestamps();


            $table->foreign('sender_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('receiver_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
