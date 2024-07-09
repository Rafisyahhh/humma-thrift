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
                "title" => "Celana Panjang",
                "thumbnail" => "celana-panjang/Snapinsta.app_448375742_850058740270825_8742631364981080060_n_1024.jpg",
            ],
            [
                "title" => "Hoodie",
                "thumbnail" => "hoodie/Snapinsta.app_448578285_17937848393837964_3762391027097602211_n_1024.jpg",
            ],
            [
                "title" => "Hoodie Nike",
                "thumbnail" => "hoodie nike/Snapinsta.app_426618857_3715843128738814_3922446649891533820_n_1080.jpg",
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
                    "brand_id" => 1,
                    "title" => $data["title"],
                    "thumbnail" => $destinationPath,
                    "price" => 150000,
                    "size" => "XL",
                    "color" => "Blue",
                    "description" => "Loading...",
                ]);
            }
        }
    }
}