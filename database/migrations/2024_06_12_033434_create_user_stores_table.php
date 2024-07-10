<?php

use App\Models\UserStore;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('user_stores', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('name');
            $table->string('username')->nullable();
            $table->string('store_logo')->nullable();
            $table->string('store_cover')->nullable();
            $table->char('nic_owner', 16)->nullable();
            $table->string('nic_photo')->nullable();
            $table->timestamp('last_login')->nullable()->useCurrent();
            $table->timestamp('verified_at')->nullable()->useCurrent();
            $table->char('verification_code', 60)->nullable();
            // $table->boolean('active')->nullable()->default(0);
            $table->text('address')->nullable();
            $table->text('description')->nullable();
            $table->time('open')->nullable();
            $table->time('close')->nullable();
            $table->enum('status', UserStore::getStoreStatusEnums()->toArray())->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('user_stores');
    }
};