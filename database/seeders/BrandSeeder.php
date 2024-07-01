<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class BrandSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        //
        $listData = [
            [
                "title" => "Adidas",
                "thumbnail" => "adidas.jpg",
            ],
            [
                "title" => "Champ",
                "thumbnail" => "champ.jpg",
            ],
            [
                "title" => "Converse",
                "thumbnail" => "converse.png",
            ],
            [
                "title" => "Dickies",
                "thumbnail" => "dickies.jpg",
            ],
            [
                "title" => "Ellese",
                "thumbnail" => "ellese.png",
            ],
            [
                "title" => "Fila",
                "thumbnail" => "fila.jpg",
            ],
            [
                "title" => "Hoodie",
                "thumbnail" => "hoodie.jpeg",
            ],
            [
                "title" => "Kappa",
                "thumbnail" => "kappa.png",
            ],
            [
                "title" => "Levis",
                "thumbnail" => "levis.png",
            ],
            [
                "title" => "N&B",
                "thumbnail" => "nb.jpg",
            ],
            [
                "title" => "Nike",
                "thumbnail" => "nike.jpg",
            ],
            [
                "title" => "Puma",
                "thumbnail" => "puma.jpg",
            ],
            [
                "title" => "Tnf",
                "thumbnail" => "tnf.png",
            ],
        ];

        $publicPath = public_path("asset-thrift/brand/");
        $uploadPath = "uploads/thumbnails/";

        foreach ($listData as $data) {
            $sourcePath = $publicPath . $data["thumbnail"];
            $destinationPath = $uploadPath . $data["thumbnail"];

            if (Storage::disk('public')->put($destinationPath, file_get_contents($sourcePath))) {
                Brand::create([
                    "title" => $data["title"],
                    "logo" => $destinationPath,
                ]);
            }
        }
    }
}