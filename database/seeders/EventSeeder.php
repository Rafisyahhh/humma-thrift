<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Models\event;

class EventSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        //
        $listData = [
            [
                "thumbnail" => "hero.jpg",
            ],
            [
                "thumbnail" => "hero2.jpg",
            ],
            [
                "thumbnail" => "heroo.jpg",
            ],
            [
                "thumbnail" => "heroo2.jpg",
            ],
        ];

        $publicPath = public_path("asset-thrift/herosection/");
        $uploadPath = "uploads/thumbnails/";

        foreach ($listData as $data) {
            $sourcePath = $publicPath . $data["thumbnail"];
            $destinationPath = $uploadPath . $data["thumbnail"];

            if (Storage::disk('public')->put($destinationPath, file_get_contents($sourcePath))) {
                event::create([
                    "judul" => "Humma Thrift",
                    "subjudul" => "Ini subtitle",
                    "foto" => $destinationPath,
                ]);
            }
        }
    }
}