<?php

namespace App\Database\Seeds;  
use CodeIgniter\Database\Seeder; 

class SupermarcheSeeder extends Seeder
{
    public function run()
    {

        /*
        |--------------------------------------------------------------------------
        | Caisses
        |--------------------------------------------------------------------------
        */

        $caisseTable = $this->db->table('caisse');

        $caisseTable->insert([
            'numero' => '1',
            'libelle' => 'Caisse 1'
        ]);

        $caisse1 = $this->db->insertID();


        $caisseTable->insert([
            'numero' => '2',
            'libelle' => 'Caisse 2'
        ]);

        $caisse2 = $this->db->insertID();



        /*
        |--------------------------------------------------------------------------
        | Produits
        |--------------------------------------------------------------------------
        */

        $produitTable = $this->db->table('produit');

        $produitTable->insert([
            'designation' => 'Biscuit',
            'prix' => 1000,
            'quantite_stock' => 50
        ]);

        $biscuit = $this->db->insertID();


        $produitTable->insert([
            'designation' => 'Pain',
            'prix' => 400,
            'quantite_stock' => 100
        ]);

        $pain = $this->db->insertID();


        $produitTable->insert([
            'designation' => 'Lait',
            'prix' => 1200,
            'quantite_stock' => 30
        ]);

        $lait = $this->db->insertID();


        $produitTable->insert([
            'designation' => 'Riz (1kg)',
            'prix' => 2500,
            'quantite_stock' => 40
        ]);

        $riz = $this->db->insertID();


        $produitTable->insert([
            'designation' => 'Savon',
            'prix' => 800,
            'quantite_stock' => 60
        ]);

        $savon = $this->db->insertID();



        /*
        |--------------------------------------------------------------------------
        | Caissier
        |--------------------------------------------------------------------------
        */

        $this->db->table('caissier')->insert([
            'mot_de_passe' => '$2y$10$5ggM0DclsFQ9nv0xZhVmv.Yn.xBh7xA6NkQff0zbE/eWRgujvssfS',
            'email' => 'caissier@gmail.com'
        ]);

        $caissier = $this->db->insertID();



        /*
        |--------------------------------------------------------------------------
        | Clients
        |--------------------------------------------------------------------------
        */

        $clientTable = $this->db->table('client');


        $clientTable->insert([
            'nom' => 'Jean Dupont'
        ]);

        $jean = $this->db->insertID();


        $clientTable->insert([
            'nom' => 'Marie Martin'
        ]);

        $marie = $this->db->insertID();


        $clientTable->insert([
            'nom' => 'Pierre Bernard'
        ]);

        $pierre = $this->db->insertID();



        /*
        |--------------------------------------------------------------------------
        | Achats
        |--------------------------------------------------------------------------
        */

        $achatTable = $this->db->table('achat');


        $achatTable->insert([
            'id_client' => $jean,
            'id_caisse' => $caisse1,
            'id_caissier' => $caissier,
            'date_achat' => '2026-01-15 10:30:00',
            'statut' => 'cloture'
        ]);

        $achatJean = $this->db->insertID();



        $achatTable->insert([
            'id_client' => $marie,
            'id_caisse' => $caisse1,
            'id_caissier' => $caissier,
            'date_achat' => '2026-01-16 14:20:00',
            'statut' => 'cloture'
        ]);

        $achatMarie = $this->db->insertID();



        $achatTable->insert([
            'id_client' => $pierre,
            'id_caisse' => $caisse2,
            'id_caissier' => $caissier,
            'date_achat' => '2026-01-17 09:45:00',
            'statut' => 'en_cours'
        ]);

        $achatPierre = $this->db->insertID();



        /*
        |--------------------------------------------------------------------------
        | Achat details
        |--------------------------------------------------------------------------
        */

        $detailTable = $this->db->table('achat_details');


        $detailTable->insertBatch([
            [
                'id_achat' => $achatJean,
                'id_produit' => $biscuit,
                'quantite' => 2,
                'prix_unitaire' => 1000
            ],
            [
                'id_achat' => $achatJean,
                'id_produit' => $lait,
                'quantite' => 3,
                'prix_unitaire' => 1200
            ],
            [
                'id_achat' => $achatMarie,
                'id_produit' => $pain,
                'quantite' => 5,
                'prix_unitaire' => 400
            ],
            [
                'id_achat' => $achatMarie,
                'id_produit' => $savon,
                'quantite' => 2,
                'prix_unitaire' => 800
            ],
            [
                'id_achat' => $achatPierre,
                'id_produit' => $riz,
                'quantite' => 1,
                'prix_unitaire' => 2500
            ],
            [
                'id_achat' => $achatPierre,
                'id_produit' => $lait,
                'quantite' => 2,
                'prix_unitaire' => 1200
            ],
        ]);
    }


    public function down()
    {
        $this->db->table('achat_details')->truncate();
        $this->db->table('achat')->truncate();
        $this->db->table('client')->truncate();
        $this->db->table('caissier')->truncate();
        $this->db->table('produit')->truncate();
        $this->db->table('caisse')->truncate();
    }
}