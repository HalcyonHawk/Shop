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
        //TODO: Change to use an API since addresses get saved in lots of ways
        Schema::create('shipping_details', function (Blueprint $table) {
            $table->bigIncrements('shipping_detail_id');
            $table->unsignedBigInteger('user_id');
            $table->string('address_1')->nullable();
            $table->string('town')->nullable();
            $table->string('postcode');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipping_details');
    }
};
