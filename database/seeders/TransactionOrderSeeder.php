<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use App\Models\TransactionOrder;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Str;

class TransactionOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orders = Product::whereNotIn('id', Order::pluck('id'))->inRandomOrder()->limit(4);
        $user = User::find(18);
        $dateStart = new Carbon('2024-07-12 12:24:13');
        $randomRefId = 'INV-' . Str::random(12);
        $randomTrxId = 'DEV-' . Str::random(12);

        if($orders->get()->isNotEmpty()) {
            $transaction = TransactionOrder::create([
                'user_id' => $user->id,
                'user_address_id' => $user->UserAddress()->first()->id,
                'total' => $orders->sum('price'),
                'reference_id' => $randomRefId,
                'transaction_id' => $randomTrxId,
                'status' => 'PAID',
                'expired_at' => $dateStart->addDays(1),
                'paid_at' => $dateStart->addHours(4),
                'payment_method' => 'BCA',
                'total_harga' => $orders->sum('price') + 2500,
                'biaya_admin' => 2500,
                'created_at' => $dateStart,
                'updated_at' => $dateStart->addHours(4),
            ]);

            collect($orders->get()->pluck('id'))->each(function($item) use ($user, $dateStart, $transaction) {
                Order::create([
                    'product_id' => $item,
                    'transaction_order_id' => $transaction->id,
                    'created_at' => $dateStart,
                    'updated_at' => $dateStart->addHours(4),
                ]);
            });
        }
    }
}
