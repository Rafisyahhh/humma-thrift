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
                "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto unde delectus adipisci, et voluptatum laudantium blanditiis? Illo, omnis? Nulla provident quae labore ipsam et nemo ad possimus molestias quod, cum veniam suscipit amet, aliquam, aliquid at? Voluptas quo explicabo quisquam officia dolore error cupiditate libero! Esse nemo repellendus laboriosam minus accusamus repellat dolorem vitae ullam eligendi doloribus quo, deleniti, dolorum, rerum et commodi. Esse similique sapiente culpa ut quis et.",
                "thumbnail" => "png/icon-colorxxxhdpi.png"
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
