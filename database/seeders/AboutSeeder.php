<?php

namespace Database\Seeders;

use App\Models\AboutUs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $listData = [
            [
                "title" => "Humma Thrift",
                "description" => "Humma Thrift adalah platform daring pertama di Malang yang fokus pada penjualan barang thrift. Kami menyediakan pakaian dan aksesori berkualitas dengan harga terjangkau, mulai dari pakaian, sepatu, hingga tas. Dengan menggabungkan konsep ramah lingkungan dan tren fashion terkini, kami membantu mengurangi limbah tekstil dan memungkinkan pelanggan tampil stylish dengan biaya rendah. Di website kami, pengguna dapat menelusuri katalog produk, melakukan pembelian, dan menggunakan fitur seperti filter pencarian, rekomendasi produk, dan ulasan pelanggan.",
                "thumbnail" => "png/icon-square-color-tsxxxhdpi.png"
            ]
        ];

        $publicPath = public_path("images/brands/");
        $uploadPath = "uploads/about/";

        foreach ($listData as $data) {
            $sourcePath = $publicPath . $data["thumbnail"];
            $destinationPath = $uploadPath . $data["thumbnail"];

            if (Storage::disk('public')->put($destinationPath, file_get_contents($sourcePath))) {
                AboutUs::create([
                    "title" => $data["title"],
                    "description" => $data["description"],
                    "image" => $destinationPath,
                ]);
            }
        }
    }
}
