<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            $table->string('user_email');
            $table->string('name');
            $table->string('address');
            $table->string('city');
            $table->string('country');
            $table->string('pincode');
            $table->integer('phone');
            $table->integer('phone');
            $table->float('shipping_changes', 8, 2);
            $table->string('coupou_code');
            $table->integer('coupou_amount');
            $table->integer('order_status');
            $table->string('payment_method');
            $table->float('grand_total');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('orders');
    }
}
