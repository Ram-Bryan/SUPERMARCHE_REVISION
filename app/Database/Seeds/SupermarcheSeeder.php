<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SupermarcheSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('caisse')->insertBatch([
            [
                'numero' => '1',
                'libelle' => 'Caisse 1',
            ],
            [
                'numero' => '2',
                'libelle' => 'Caisse 2',
            ],
        ]);

        // ==========================
        // Produits
        // ==========================
        $this->db->table('produit')->insertBatch([
            [
                'designation' => 'Biscuit',
                'prix' => 1000,
                'quantite_stock' => 50,
            ],
            [
                'designation' => 'Pain',
                'prix' => 400,
                'quantite_stock' => 100,
            ],
            [
                'designation' => 'Lait',
                'prix' => 1200,
                'quantite_stock' => 30,
            ],
            [
                'designation' => 'Riz (1kg)',
                'prix' => 2500,
                'quantite_stock' => 40,
            ],
            [
                'designation' => 'Savon',
                'prix' => 800,
                'quantite_stock' => 60,
            ],
        ]);

        // ==========================
        // Caissier
        // ==========================
        $this->db->table('caissier')->insert([
            'email' => 'caissier@gmail.com',
            'mot_de_passe' => '$2y$10$5ggM0DclsFQ9nv0xZhVmv.Yn.xBh7xA6NkQff0zbE/eWRgujvssfS',
        ]);
    }
}