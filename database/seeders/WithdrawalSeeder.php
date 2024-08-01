<?php

namespace Database\Seeders;

use App\Models\Withdrawal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Str;

class WithdrawalSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        //

        for ($i = 0; $i < 10; $i++) {
            Withdrawal::create([
                'user_id' => 16,
                'user_store_id' => 1,
                'bank_id' => random_int(0, 107),
                'bank_number' => 7974258162899519,
                'amount' => $this->random_int_with_fixed_suffix(50_000, 5_000_000),
                'transaction_id' => Str::upper("WTH-{" . Str::random(16) . "}"),
            ]);
        }
    }

    function random_int_with_fixed_suffix($min, $max, $suffix = 0) {
        $min_adjusted = (int) ($min / 1000);
        $max_adjusted = (int) ($max / 1000);

        $random_number = random_int($min_adjusted, $max_adjusted);

        return $random_number * 1000 + $suffix;
    }
}