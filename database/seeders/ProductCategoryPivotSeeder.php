<?php

namespace Database\Seeders;

use App\Models\ProductCategoryPivot;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCategoryPivotSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        //
        ProductCategoryPivot::insert([
            [
                'product_category_id' => 1,
                'product_id' => 1,
                'product_auction_id' => null,
            ],
            [
                'product_category_id' => 1,
                'product_id' => null,
                'product_auction_id' => 1,
            ],
            //
            [
                'product_category_id' => 3,
                'product_id' => 2,
                'product_auction_id' => null,
            ],
            [
                'product_category_id' => 3,
                'product_id' => null,
                'product_auction_id' => 2,
            ],
            //
            [
                'product_category_id' => 1,
                'product_id' => 3,
                'product_auction_id' => null,
            ],
            [
                'product_category_id' => 1,
                'product_id' => null,
                'product_auction_id' => 3,
            ],
            //
            [
                'product_category_id' => 1,
                'product_id' => 4,
                'product_auction_id' => null,
            ],
            [
                'product_category_id' => 1,
                'product_id' => null,
                'product_auction_id' => 4,
            ],
            //
            [
                'product_category_id' => 2,
                'product_id' => 5,
                'product_auction_id' => null,
            ],
            [
                'product_category_id' => 2,
                'product_id' => null,
                'product_auction_id' => 5,
            ],
            //
            [
                'product_category_id' => 5,
                'product_id' => 6,
                'product_auction_id' => null,
            ],
            [
                'product_category_id' => 5,
                'product_id' => null,
                'product_auction_id' => 6,
            ],
            //
            [
                'product_category_id' => 5,
                'product_id' => 7,
                'product_auction_id' => null,
            ],
            [
                'product_category_id' => 5,
                'product_id' => null,
                'product_auction_id' => 7,
            ],
            //
            [
                'product_category_id' => 5,
                'product_id' => 8,
                'product_auction_id' => null,
            ],
            [
                'product_category_id' => 5,
                'product_id' => null,
                'product_auction_id' => 8,
            ],
            //
            [
                'product_category_id' => 5,
                'product_id' => 9,
                'product_auction_id' => null,
            ],
            [
                'product_category_id' => 5,
                'product_id' => null,
                'product_auction_id' => 9,
            ],
            //
            [
                'product_category_id' => 1,
                'product_id' => 10,
                'product_auction_id' => null,
            ],
            [
                'product_category_id' => 1,
                'product_id' => null,
                'product_auction_id' => 10,
            ],
            //
            [
                'product_category_id' => 1,
                'product_id' => 11,
                'product_auction_id' => null,
            ],
            [
                'product_category_id' => 1,
                'product_id' => null,
                'product_auction_id' => 11,
            ],
            //
            [
                'product_category_id' => 1,
                'product_id' => 12,
                'product_auction_id' => null,
            ],
            [
                'product_category_id' => 1,
                'product_id' => null,
                'product_auction_id' => 12,
            ],
            //
            [
                'product_category_id' => 5,
                'product_id' => 13,
                'product_auction_id' => null,
            ],
            [
                'product_category_id' => 5,
                'product_id' => null,
                'product_auction_id' => 13,
            ],
            //
            [
                'product_category_id' => 1,
                'product_id' => 14,
                'product_auction_id' => null,
            ],
            [
                'product_category_id' => 1,
                'product_id' => null,
                'product_auction_id' => 14,
            ],
            //
            [
                'product_category_id' => 2,
                'product_id' => 15,
                'product_auction_id' => null,
            ],
            [
                'product_category_id' => 2,
                'product_id' => null,
                'product_auction_id' => 15,
            ],
            //
            [
                'product_category_id' => 2,
                'product_id' => 16,
                'product_auction_id' => null,
            ],
            [
                'product_category_id' => 2,
                'product_id' => null,
                'product_auction_id' => 16,
            ],
        ]);
    }
}