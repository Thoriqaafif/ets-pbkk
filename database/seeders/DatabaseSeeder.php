<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Barang;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        Barang::factory(10)->create();

        User::factory()->create([
            'name' => 'Thoriq Afif Habibi',
            'email' => 'test@example.com',
            'password' => bcrypt('12345'),
        ]);
    }
}
