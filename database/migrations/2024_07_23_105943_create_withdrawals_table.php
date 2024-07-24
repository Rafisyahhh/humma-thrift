<?php

use App\Models\Withdrawal;
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
        Schema::create('withdrawals', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->timestamp('finished_at')->useCurrent()->nullable();
            // $table->foreignId('store_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->bigInteger('amount');
            // $table->enum('status', Withdrawal::getWithdrawalStatusEnum()->toArray())->default(WithdrawalStatusEnum::PENDING->value);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('withdrawals');
    }
};
