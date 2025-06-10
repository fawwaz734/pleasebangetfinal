<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
public function up()
{
    Schema::create('order_details', function (Blueprint $table) {
        // $table->engine= 'InnoDB';
        
        $table->uuid('id')->primary();

        $table->uuid('order_id')->constrained('orders')->onDelete('cascade');
        $table->uuid('product_id')->constrained('products')->onDelete('cascade');
        $table->integer('quantity')->default(1);
        $table->bigInteger('price');
        $table->timestamps();

//         $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
// $table->foreign('product_id')->references('id')->on('products')->cascadeOnDelete();
    });

}

    public function down()
    {
        Schema::dropIfExists('orders_details');
    }
};