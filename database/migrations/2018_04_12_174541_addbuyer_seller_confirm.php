<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddbuyerSellerConfirm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->boolean('seller_order_confirm')->after('payment_status')->default(0);
            $table->dateTime('seller_order_confirm_date')->nullable()->after('seller_order_confirm');

            $table->boolean('buyer_order_confirm')->after('seller_order_confirm_date')->default(0);
            $table->dateTime('buyer_order_confirm_date')->nullable()->after('buyer_order_confirm');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            //
        });
    }
}
