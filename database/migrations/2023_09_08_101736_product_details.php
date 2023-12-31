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
        Schema::create('product_details', function (Blueprint $table) {
            $table->bigIncrements('product_detail_id');
            $table->unsignedBigInteger('product_id');
            $table->string('colour');
            //TODO: Add seperate images table and link to it so that a product detail can have multiple images
            $table->string('image');
            //Price can be different for each colour
            //TODO: Change how price is stored to account for different currencies. Maybe add a column for currency
            $table->integer('price');
            //Each colour has different stock levels
            $table->integer('stock');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_details');
    }
};
