<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ProductCategorySeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        //
        $listData = [
            [
                "title" => "Hoodie",
                "thumbnail" => "hoodie.png",
            ],
            [
                "title" => "Jacket",
                "thumbnail" => "jacket.png",
            ],
            [
                "title" => "Longpants",
                "thumbnail" => "longpants.png",
            ],
            [
                "title" => "Poloo",
                "thumbnail" => "poloo.png",
            ],
            [
                "title" => "Shortpants",
                "thumbnail" => "shortpants.png",
            ],
            [
                "title" => "Tshirt",
                "thumbnail" => "tshirt.png",
            ],
        ];

        $publicPath = public_path("asset-thrift/kategori/");
        $uploadPath = "uploads/thumbnails/";

        foreach ($listData as $data) {
            $sourcePath = $publicPath . $data["thumbnail"];
            $destinationPath = $uploadPath . $data["thumbnail"];

            if (Storage::disk('public')->put($destinationPath, file_get_contents($sourcePath))) {
                ProductCategory::create([
                    "title" => $data["title"],
                    "icon" => $destinationPath,
                ]);
            }
        }
    }
}