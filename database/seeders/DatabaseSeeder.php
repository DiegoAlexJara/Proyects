<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            ProyectsSeeder::class,
        ]);
        $user = User::create([
            'name' => 'visitante',
            'email' => 'visitante@gmail.com',
            'password' => Hash::make('password123'),
        ]);
        $user->Projects()->attach([1, 2, 3]);
        $user = User::create([
            'name' => 'Diego',
            'email' => 'diego@gmail.com',
            'password' => Hash::make('Diego12345'),
        ]);
        $user->Projects()->attach([1, 2, 3]);
    }
}
