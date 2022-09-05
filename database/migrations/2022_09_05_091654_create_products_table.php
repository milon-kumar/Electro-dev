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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->string('name');
            $table->string('slug');
            $table->integer('price');
            $table->enum('stock_status',['in-stock','out-of-stock'])->default('in-stock');
            $table->text('short_description');
            $table->string('size')->nullable();
            $table->string('color')->nullable();
            $table->integer('quantity');
            $table->string('image')->nullable()->default('default.jpg');
            $table->longText('description')->nullable();
            $table->longText('details')->nullable();
            $table->enum('product_feature',['new','sell','hot','top'])->nullable()->default('new');
            $table->integer('discount')->nullable();
            $table->integer('sell_count')->default(0);
            $table->integer('view_count')->default(0);
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('products');
    }
};
