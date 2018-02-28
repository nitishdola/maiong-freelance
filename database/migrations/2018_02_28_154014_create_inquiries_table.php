<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inquiries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('profile_id', false, true);
            $table->integer('sender_user_id', false, true);
            $table->text('message');
            $table->boolean('status')->default(1);
            $table->timestamps();

            $table->foreign('profile_id', 'profrgn')->references('id')->on('user_profiles')->onDelete('cascade');
            $table->foreign('sender_user_id', 'usfrgn')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inquiries');
    }
}
