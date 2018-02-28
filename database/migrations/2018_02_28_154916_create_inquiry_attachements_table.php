<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInquiryAttachementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inquiry_attachements', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('inquiry_id', false, true);
            $table->string('file_path', 255);
            $table->boolean('status')->default(1);
            $table->timestamps();

            $table->foreign('inquiry_id', 'inqfrgn')->references('id')->on('inquiries')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inquiry_attachements');
    }
}
