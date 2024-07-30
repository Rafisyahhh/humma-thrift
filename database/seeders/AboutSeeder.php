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
                "description" => "Humma Thrift adalah platform daring pertama di Malang yang berfokus pada penjualan barang-barang thrift. Didirikan dengan tujuan untuk menyediakan pakaian dan aksesori berkualitas dengan harga terjangkau, Humma Thrift menawarkan berbagai macam produk fashion yang telah dikurasi dengan baik, mulai dari pakaian, sepatu, hingga tas dan aksesori lainnya. Platform ini menggabungkan konsep ramah lingkungan dengan tren fashion terkini, sehingga tidak hanya membantu mengurangi limbah tekstil tetapi juga memberikan kesempatan bagi para pelanggan untuk tetap tampil stylish tanpa harus mengeluarkan banyak biaya. Melalui website Humma Thrift, pengguna dapat dengan mudah menelusuri katalog produk, melakukan pembelian, serta memanfaatkan fitur-fitur seperti filter pencarian, rekomendasi produk, dan ulasan pelanggan.",
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
