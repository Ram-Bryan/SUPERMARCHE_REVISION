<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAchatDetailsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_detail' => [
                'type' => 'INTEGER',
                'auto_increment' => true,
            ],
            'id_achat' => [
                'type' => 'INTEGER',
            ],
            'id_produit' => [
                'type' => 'INTEGER',
            ],
            'quantite' => [
                'type' => 'INTEGER',
            ],
            'prix_unitaire' => [
                'type' => 'REAL',
            ],
        ]);

        $this->forge->addKey('id_detail', true);

        $this->forge->addForeignKey('id_achat', 'achat', 'id_achat', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_produit', 'produit', 'id_produit', 'NO ACTION', 'NO ACTION');

        $this->forge->createTable('achat_details');
    }

    public function down()
    {
        $this->forge->dropTable('achat_details');
    }
}