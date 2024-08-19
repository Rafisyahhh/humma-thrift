<?php

namespace Database\Seeders;

use App\Models\AdminFee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminFeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AdminFee::create([
            "biaya_admin" => 1000
        ]);
    }
}
