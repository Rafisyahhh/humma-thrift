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
        Storage::disk('public')->put("uploads/thumbnails/logo.jpg", file_get_contents(public_path("asset-thrift/brand/adidas.jpg")));
        UserStore::create([
            "user_id" => 16,
            "name" => "store_1",
            "username" => "store_1",
            "description" => "This is store 1",
            "address" => "123 Main St",
            "store_logo" => "uploads/thumbnails/logo.jpg",
        ]);
    }
}