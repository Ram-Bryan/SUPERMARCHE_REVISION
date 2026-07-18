<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProduitTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_produit' => [
                'type' => 'INTEGER',
                'auto_increment' => true,
            ],
            'designation' => [
                'type' => 'TEXT',
            ],
            'prix' => [
                'type' => 'REAL',
            ],
            'quantite_stock' => [
                'type' => 'INTEGER',
                'default' => 0,
            ],
        ]);

        $this->forge->addKey('id_produit', true);
        $this->forge->createTable('produit');
    }

    public function down()
    {
        $this->forge->dropTable('produit');
    }
}