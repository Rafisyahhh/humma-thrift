<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('product_auctions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('store_id')->constrained("user_stores");
            $table->foreignId('brand_id')->constrained();
            $table->string('title');
            $table->text('description');
            $table->string('thumbnail');
            $table->string('size');
            $table->string('color');
            $table->enum('status', ['active', 'inactive', 'sold'])->default('active');
            $table->bigInteger('bid_price_start')->nullable();
            $table->bigInteger('bid_price_end')->nullable();
            $table->bigInteger('price')->nullable();
            $table->string('slug')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('product_auctions');
    }
};
