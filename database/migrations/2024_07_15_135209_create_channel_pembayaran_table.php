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
        Schema::create('channel_pembayarans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('channel_code');
            $table->bigInteger('flat')->nullable();
            $table->bigInteger('percent')->nullable();
            $table->string('icon_url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('channel_pembayaran');
    }
};
