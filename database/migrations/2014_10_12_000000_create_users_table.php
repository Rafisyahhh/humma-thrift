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
            $table->id();
            $table->timestamps();
            $table->string('username')->nullable()->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->string('name');
            $table->char('phone', 24)->nullable();
            $table->string('avatar')->nullable();
            $table->string('pbirth')->nullable();
            $table->date('dbirth')->nullable();
            // $table->string('pbirth')->nullable();
            $table->char('nic', 16)->nullable();
            $table->string('nic_photo')->nullable();
            $table->boolean('banned')->default(false);
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
