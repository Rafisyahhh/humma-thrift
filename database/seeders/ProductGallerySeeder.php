<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductGallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $listData = [
            [
                "title" => "BKLYN Baju",
                "thumbnail" => "produk1/Snapinsta.app_450212961_17939780780837964_5290913863703747422_n_1080",
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
        $uploadPath = "uploads/gallery/";

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
