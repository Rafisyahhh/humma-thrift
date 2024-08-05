<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     */
    public function run(): void {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            ProductCategorySeeder::class,
            BrandSeeder::class,
            AboutSeeder::class,
            EventSeeder::class,
            BankSeeder::class,
            UserStoreSeeder::class,
            ProductSeeder::class,
            ProductAuctionSeeder::class,
            ProductGallerySeeder::class,
            ProductCategoryPivotSeeder::class,
            // WithdrawalSeeder::class,
        ]);
    }
}
