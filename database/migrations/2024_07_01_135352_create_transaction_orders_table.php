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
        Schema::create('transaction_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('user_address_id')->constrained();
            $table->bigInteger('total');
            $table->string('transaction_id');
            $table->string('reference_id');
            $table->timestamp('expired_at')->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->enum('delivery_status', ['selesaikan pesanan','dikemas','diantar','diterima','selesai'])->default('selesaikan pesanan');
            $table->enum('status',['UNPAID','PAID','REFUND','EXPIRED','FAILED']);
            $table->string('payment_method');
            $table->string('total_harga');
            $table->string('biaya_admin');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_orders');
    }
};
