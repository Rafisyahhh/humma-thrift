<?php

namespace Database\Seeders;

use App\Models\UserStore;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class UserStoreSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        //
        Storage::disk('public')->put("uploads/thumbnails/logo.jpg", file_get_contents(public_path("asset-thrift/produk/celana-panjang/Snapinsta.app_448375742_850058740270825_8742631364981080060_n_1024.jpg")));
        UserStore::create([
            "user_id" => 1,
            "name" => "store_1",
            "username" => "store_1",
            "description" => "This is store 1",
            "address" => "123 Main St",
            "store_logo" => "uploads/thumbnails/logo.jpg",
            "active" => "1"
        ]);
    }
}