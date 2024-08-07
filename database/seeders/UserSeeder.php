<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        User::factory()->withRole('admin')->create([
            'name' => 'Super Admin',
            'email' => 'admin@humma-thrift.com',
        ]);

        User::factory(4)->withRole('admin')->create();
        User::factory(10)->withRole('user')->create();

        User::factory()->withRole('user')->create([
            'name' => 'Toko Ajaib',
            'email' => 'shop1@humma-thrift.com',
        ]);

        $teamAccount = [
            [
                'username' => 'Syauqi Ali',
                'name' => 'Ahmad Syauqi Ali Syahbana',
                'email' => 'sauqi2019@gmail.com'
            ],
            [
                'username' => 'Cinta',
                'name' => 'Cinta Adenia',
                'email' => 'ccintaadenia06@gmail.com'
            ],
            [
                'username' => 'Syahfaa',
                'name' => 'Ananda Syahfaa',
                'email' => 'anandasyahfa8@gmail.com'
            ],
            [
                'username' => 'Nasya',
                'name' => 'Nasya Asriva Putri Artama',
                'email' => 'asrivanasya0@gmail.com'
            ],
            [
                'username' => 'Tika',
                'name' => 'Nugi Artika',
                'email' => 'nugiartika@gmail.com'
            ]
        ];
        foreach ($teamAccount as $account) {
            User::factory()->withRole('user')->create($account);
        }
    }
}