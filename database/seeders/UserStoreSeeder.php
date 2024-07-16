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
            "name" => "Dummy Shop",
            "username" => "dummyshop35",
            "store_logo" => "uploads/thumbnails/logo.jpg",
            "nic_owner" => "0099887766",
            "address" => "123 Main St",
            "description" => "This is store 1",
            "open" => "  08:00:00",
            "close" => "  20:00:00",
            "status" => "online"
        ]);
    }
}