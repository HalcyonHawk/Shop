<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cart', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('product_detail_id');
            //Keep track of when products are added to the cart
            $table->timestamp('added_at')->nullable();

        });

        Schema::table('cart', function($table) {
            $table->foreign('product_detail_id')->references('product_detail_id')->on('product_details');
            $table->foreign('user_id')->references('user_id')->on('users');
         });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart');
    }
};
