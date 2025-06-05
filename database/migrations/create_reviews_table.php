<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{


public function up()
{
    Schema::create('reviews', function (Blueprint $table) {
        $table->uuid('id')->primary();
        $table->foreignUuid('user_id')->constrained()->onDelete('cascade');
        $table->foreignUuid('product_id')->constrained()->onDelete('cascade');
        $table->integer('rating'); // 1 to 5
        $table->text('comment')->nullable();
        $table->timestamps();

        $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
        $table->foreign('product_id')->references('id')->on('products')->cascadeOnDelete();
    });
}

    public function down()
    {
        Schema::dropIfExists('reviews');
    }
};