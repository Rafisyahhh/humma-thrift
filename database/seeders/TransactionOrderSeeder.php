<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\TransactionOrder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orders = Product::inRandomOrder()->take(5);

        dd($orders->sum('price'));

        // TransactionOrder::create([]);
    }
}
