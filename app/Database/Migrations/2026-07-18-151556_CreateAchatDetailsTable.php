<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAchatDetailsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_detail' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_achat' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => false,
            ],
            'id_produit' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => false,
            ],
            'quantite' => [
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => false,
            ],
            'prix_unitaire' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
                'null'       => false,
            ],
        ]);
        $this->forge->addKey('id_detail', true);
        $this->forge->addForeignKey('id_achat', 'achat', 'id_achat');
        $this->forge->addForeignKey('id_produit', 'produit', 'id_produit');
        $this->forge->createTable('achat_details');
    }

    public function down()
    {
        $this->forge->dropTable('achat_details');
    }
}