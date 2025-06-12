<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        \App\Models\Medecin::create([
            'nom' => 'faye',
            'prenom' => 'Gana',
            'email' => 'fayegana@example.com',
            'password' => bcrypt('gana123'),
            'telephone' => '0600000001',
            'specialite' => 'Cardiologie',
            'numeros_professionel' => '123456'
        ]);
        \App\Models\Medecin::create([
            'nom' => 'khar',
            'prenom' => 'tall',
            'email' => 'khartall@example.com',
            'password' => bcrypt('khartall123'),
            'telephone' => '0600000002',
            'specialite' => 'Gynécologie',
            'numeros_professionel' => '654321'
        ]);
    }
}
