<?php

namespace Database\Seeders;

use App\Models\ProductAuction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ProductAuctionSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        //
        $listData = [
            [
                "title" => "I Hoodie BKLYN I",
                "thumbnail" => "produk1/Snapinsta.app_450212961_17939780780837964_5290913863703747422_n_1080.jpg",
                "brand_id" => "1",
                "warna" => "abu-abu"
            ],
            [
                "title" => "I Celana Panjang Levi's I",
                "thumbnail" => "produk 2/Snapinsta.app_448375742_850058740270825_8742631364981080060_n_1024.jpg",
                "brand_id" => "8",
                "warna" => "biru"
            ],
            [
                "title" => "I Hoodie Dickies I",
                "thumbnail" => "produk 3/Snapinsta.app_448578285_17937848393837964_3762391027097602211_n_1024.jpg",
                "brand_id" => "4",
                "warna" => "abu-abu"
            ],
            [
                "title" => "I Hoodie Nike I",
                "thumbnail" => "produk 4/Snapinsta.app_426618857_3715843128738814_3922446649891533820_n_1080.jpg",
                "brand_id" => "10",
                "warna" => "ungu"
            ],
            [
                "title" => "I Jacket K2 I",
                "thumbnail" => "produk 5/Snapinsta.app_448341563_995984298367710_5344656848719840373_n_1080.jpg",
                "brand_id" => "1",
                "warna" => "hitam"
            ],
            [
                "title" => "I Celana Pendek Adidas I",
                "thumbnail" => "produk 6/Snapinsta.app_448357322_474218735185281_6481241407556896236_n_1080.jpg",
                "brand_id" => "1",
                "warna" => "hitam"
            ],
            [
                "title" => "I Tshirt Adidas I",
                "thumbnail" => "produk 7/Snapinsta.app_448485840_983509546565262_2816151686033853688_n_1080.jpg",
                "brand_id" => "1",
                "warna" => "hitam"
            ],
            [
                "title" => "I Tshirt Kappa I",
                "thumbnail" => "produk 8/Snapinsta.app_448987849_450540564610886_2396862856574379293_n_1080.jpg",
                "brand_id" => "7",
                "warna" => "hitam"
            ],
            [
                "title" => "I Tshirt Retromini I",
                "thumbnail" => "produk 9/Snapinsta.app_449259329_460638863331759_7544158016605075913_n_1080.jpg",
                "brand_id" => "1",
                "warna" => "hitam"
            ],
            [
                "title" => "I Hoodie Nike RGB I",
                "thumbnail" => "produk 10/Snapinsta.app_450524182_2229799200700940_3097312920594944612_n_1080.jpg",
                "brand_id" => "10",
                "warna" => "hitam"
            ],
            [
                "title" => "I Hoodie Adidas I",
                "thumbnail" => "produk 11/Snapinsta.app_450457586_1623056398550381_417407161173248983_n_1080.jpg",
                "brand_id" => "1",
                "warna" => "abu-abu"
            ],
            [
                "title" => "I Hoodie NB I",
                "thumbnail" => "produk12/Snapinsta.app_449667174_1211170809928022_877366606342498901_n_1080.jpg",
                "brand_id" => "9",
                "warna" => "Merah"
            ],
            [
                "title" => "I Celana Pendek Fila I",
                "thumbnail" => "produk13/Snapinsta.app_450540922_1063744595095824_3433317237109425880_n_1080.jpg",
                "brand_id" => "6",
                "warna" => "hitam"
            ],
            [
                "title" => "I Hoodie K2 I",
                "thumbnail" => "produk14/Snapinsta.app_449702773_17938664798837964_973209378275100224_n_1080.jpg",
                "brand_id" => "1",
                "warna" => "oranye"
            ],
            [
                "title" => "I Jacket Adidas I",
                "thumbnail" => "produk15/Snapinsta.app_449694833_1182886596246204_4792388900707274676_n_1080.jpg",
                "brand_id" => "1",
                "warna" => "hitam"
            ],
            [
                "title" => "I Jacket Champions I",
                "thumbnail" => "produk16/Snapinsta.app_448327613_472791948448308_1163501365549914326_n_1080.jpg",
                "brand_id" => "2",
                "warna" => "biru"
            ],
        ];

        $publicPath = public_path("asset-thrift/produk/");
        $uploadPath = "uploads/thumbnails/";

        foreach ($listData as $data) {
            $sourcePath = $publicPath . $data["thumbnail"];
            $destinationPath = $uploadPath . $data["thumbnail"];
            $priceStart = random_int(1_000, 1_000_000);

            if (Storage::disk('public')->put($destinationPath, file_get_contents($sourcePath))) {
                ProductAuction::create([
                    "user_id" => 16,
                    "store_id" => 1,
                    "brand_id" => $data["brand_id"],
                    "title" => $data["title"],
                    "thumbnail" => $destinationPath,
                    "bid_price_start" => $priceStart,
                    "bid_price_end" => random_int($priceStart, $priceStart + 500_000),
                    "size" => "XL",
                    "color" => $data["warna"],
                    "description" => "Loading...",
                ]);
            }
        }
    }
}