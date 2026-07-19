<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SeedInitialData extends Migration
{
    public function up()
    {
        // Insert caisses
        $this->db->table('caisse')->insertBatch([
            ['numero' => '1', 'libelle' => 'Caisse 1'],
            ['numero' => '2', 'libelle' => 'Caisse 2'],
        ]);

        // Insert produits
        $this->db->table('produit')->insertBatch([
            ['designation' => 'Biscuit', 'prix' => 1000, 'quantite_stock' => 50],
            ['designation' => 'Pain', 'prix' => 400, 'quantite_stock' => 100],
            ['designation' => 'Lait', 'prix' => 1200, 'quantite_stock' => 30],
            ['designation' => 'Riz (1kg)', 'prix' => 2500, 'quantite_stock' => 40],
            ['designation' => 'Savon', 'prix' => 800, 'quantite_stock' => 60],
        ]);

        // Insert caissier
        $this->db->table('caissier')->insert([
            'mot_de_passe' => '$2y$10$5ggM0DclsFQ9nv0xZhVmv.Yn.xBh7xA6NkQff0zbE/eWRgujvssfS',
            'email' => 'caissier@gmail.com',
        ]);
    }

    public function down()
    {
        // Truncate tables in reverse order
        $this->db->table('achat_details')->truncate();
        $this->db->table('achat')->truncate();
        $this->db->table('client')->truncate();
        $this->db->table('caissier')->truncate();
        $this->db->table('produit')->truncate();
        $this->db->table('caisse')->truncate();
    }
}