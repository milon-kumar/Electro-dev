<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->integer('product_id')->nullable();
            $table->string('order_id')->nullable();
            $table->integer('grand_total')->default(0);
            $table->integer('total')->default(0);
            $table->string('shipping_information')->nullable();
            $table->string('billing_information')->nullable();
            $table->string('payment_method')->nullable();
            $table->enum('payment_status',['paid','unpaid','pending','payment_failed'])->nullable();
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
        Schema::dropIfExists('order_details');
    }
};
