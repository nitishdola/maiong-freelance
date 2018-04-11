<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('buyer_id', false, true);
            
            $table->integer('seller_id', false, true);
            $table->integer('seller_profile_id', false, true);

            $table->decimal('project_cost', 30,2);

            $table->date('order_date');
            $table->date('expected_delivery_date');
            $table->date('project_delivery_date')->nullable();

            $table->string('order_current_status', 50)->default('order_placed');

            $table->boolean('payment_transferred_to_seller')->default(0);
            $table->date('payment_transferred_to_seller_date')->nullable();
            $table->integer('payment_transferred_to_seller_by', false, true)->nullable();

            $table->boolean('payment_status')->default(0);
            $table->boolean('project_delivered')->default(0);

            $table->boolean('status')->default(0);

            $table->timestamps();

            $table->foreign('buyer_id', 'buyfk')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
