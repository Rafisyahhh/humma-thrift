<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->withRole('admin')->create([
            'fullname' => 'Super Admin',
            'email' => 'admin@humma-thrift.com',
        ]);

        User::factory(5)->withRole('admin')->create();
        User::factory(10)->withRole('user')->create();
    }
}
