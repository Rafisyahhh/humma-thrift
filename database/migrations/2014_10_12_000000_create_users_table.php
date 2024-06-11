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
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Sama dengan BIGINT, auto-increment
            $table->timestamps(); // Otomatis membuat created_at dan updated_at
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->string('fullname');
            $table->string('phone', 24);
            $table->string('avatar')->nullable(); // Menambahkan nullable
            $table->string('dbirth')->nullable(); // Menambahkan nullable
            $table->binary('nic_photo'); // Tipe data untuk menyimpan file gambar
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
