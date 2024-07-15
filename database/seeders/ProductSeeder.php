<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ProductSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        //
        $listData = [
            [
                "title" => "Hoodie BKLYN",
                "thumbnail" => "produk1/Snapinsta.app_450212961_17939780780837964_5290913863703747422_n_1080.jpg",
                "brand_id" => "1",
                "warna" => "Abu-abu"
            ],
            [
                "title" => "Celana Panjang Levi's",
                "thumbnail" => "produk 2/Snapinsta.app_448375742_850058740270825_8742631364981080060_n_1024.jpg",
                "brand_id" => "8",
                "warna" => "Biru"
            ],
            [
                "title" => "Hoodie Dickies",
                "thumbnail" => "produk 3/Snapinsta.app_448578285_17937848393837964_3762391027097602211_n_1024.jpg",
                "brand_id" => "4",
                "warna" => "Abu-abu"
            ],
            [
                "title" => "Hoodie Nike",
                "thumbnail" => "produk 4/Snapinsta.app_426618857_3715843128738814_3922446649891533820_n_1080.jpg",
                "brand_id" => "10",
                "warna" => "Ungu"
            ],
            [
                "title" => "Jacket K2",
                "thumbnail" => "produk 5/Snapinsta.app_448341563_995984298367710_5344656848719840373_n_1080.jpg",
                "brand_id" => "1",
                "warna" => "Hitam"
            ],
            [
                "title" => "Celana Pendek Adidas",
                "thumbnail" => "produk 6/Snapinsta.app_448357322_474218735185281_6481241407556896236_n_1080.jpg",
                "brand_id" => "1",
                "warna" => "Hitam"
            ],
            [
                "title" => "Tshirt Adidas",
                "thumbnail" => "produk 7/Snapinsta.app_448485840_983509546565262_2816151686033853688_n_1080.jpg",
                "brand_id" => "1",
                "warna" => "Hitam"
            ],
            [
                "title" => "Tshirt Kappa",
                "thumbnail" => "produk 8/Snapinsta.app_448987849_450540564610886_2396862856574379293_n_1080.jpg",
                "brand_id" => "7",
                "warna" => "Hitam"
            ],
            [
                "title" => "Tshirt Retromini",
                "thumbnail" => "produk 9/Snapinsta.app_449259329_460638863331759_7544158016605075913_n_1080.jpg",
                "brand_id" => "1",
                "warna" => "Hitam"
            ],
            [
                "title" => "Hoodie Nike RGB",
                "thumbnail" => "produk 10/Snapinsta.app_450524182_2229799200700940_3097312920594944612_n_1080.jpg",
                "brand_id" => "10",
                "warna" => "Hitam"
            ],
            [
                "title" => "Hoodie Adidas",
                "thumbnail" => "produk 11/Snapinsta.app_450457586_1623056398550381_417407161173248983_n_1080.jpg",
                "brand_id" => "1",
                "warna" => "Abu-abu"
            ],
            [
                "title" => "Hoodie NB",
                "thumbnail" => "produk12/Snapinsta.app_449667174_1211170809928022_877366606342498901_n_1080.jpg",
                "brand_id" => "9",
                "warna" => "Merah"
            ],
            [
                "title" => "Celana Pendek Fila",
                "thumbnail" => "produk13/Snapinsta.app_450540922_1063744595095824_3433317237109425880_n_1080.jpg",
                "brand_id" => "6",
                "warna" => "Hitam"
            ],
            [
                "title" => "Hoodie K2",
                "thumbnail" => "produk14/Snapinsta.app_449702773_17938664798837964_973209378275100224_n_1080.jpg",
                "brand_id" => "1",
                "warna" => "Oranye"
            ],
            [
                "title" => "Jacket Adidas",
                "thumbnail" => "produk15/Snapinsta.app_449694833_1182886596246204_4792388900707274676_n_1080.jpg",
                "brand_id" => "1",
                "warna" => "Hitam"
            ],
            [
                "title" => "Jacket Champions",
                "thumbnail" => "produk16/Snapinsta.app_448327613_472791948448308_1163501365549914326_n_1080.jpg",
                "brand_id" => "2",
                "warna" => "Biru"
            ],
        ];

        $publicPath = public_path("asset-thrift/produk/");
        $uploadPath = "uploads/thumbnails/";

        foreach ($listData as $data) {
            $sourcePath = $publicPath . $data["thumbnail"];
            $destinationPath = $uploadPath . $data["thumbnail"];

            if (Storage::disk('public')->put($destinationPath, file_get_contents($sourcePath))) {
                Product::create([
                    "user_id" => 16,
                    "store_id" => 1,
                    "brand_id" => $data["brand_id"],
                    "title" => $data["title"],
                    "thumbnail" => $destinationPath,
                    "price" => 150000,
                    "size" => "XL",
                    "color" => $data["warna"],
                    "description" => "Loading...",
                ]);
            }
        }
    }
}