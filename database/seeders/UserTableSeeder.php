<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name'     => 'Admin',
            'email'    => 'admin@laravelplus.com',
            'password' => bcrypt('secret'),
        ]);

        User::factory()->create([
            'name'     => 'User',
            'email'    => 'user@laravelplus.com',
            'password' => bcrypt('secret'),
        ]);
    }
}
