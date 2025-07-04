<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run()
    {
        if (Administrateur::count() === 0) {
            Administrateur::create([
                'nom' => 'Administrateur',
                'email' => 'admin@medicare.com',
                'telephone' => '770000000',
                'password' => Hash::make('admin1234'), // à changer après connexion
            ]);

            echo "✅ Compte admin par défaut créé : admin@medicare.com / admin1234\n";
        } else {
            echo "ℹ️ Un compte admin existe déjà. Aucun nouveau compte créé.\n";
        }
    }
}
