<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
public function up()
{
    Schema::create('orders_details', function (Blueprint $table) {
        $table->id();
        $table->foreignUuid('order_id')->constrained('orders')->onDelete('cascade');
        $table->foreignUuid('product_id')->constrained('products')->onDelete('cascade');
        $table->integer('quantity')->default(1);
        $table->bigInteger('price');
        $table->timestamps();

        $table->foreign('order_id')->references('id')->on('orders')->cascadeOnDelete();
        $table->foreign('product_id')->references('id')->on('products')->cascadeOnDelete();
    });

}

    public function down()
    {
        Schema::dropIfExists('orders_details');
    }
};