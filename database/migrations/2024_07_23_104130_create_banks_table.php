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
        Schema::create('banks', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('type', 51)->nullable();
            $table->string('code', 3)->nullable();
            $table->string('name', 45)->nullable();
            $table->string('shortname', 45)->nullable();
            $table->string('address', 128)->nullable();
            $table->string('phone', 41)->nullable();
            $table->string('fax', 51)->nullable();
            $table->string('website', 33)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banks');
    }
};
