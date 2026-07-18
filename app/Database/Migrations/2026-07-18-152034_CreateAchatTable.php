<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAchatTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_achat' => [
                'type' => 'INTEGER',
                'auto_increment' => true,
            ],
            'id_client' => [
                'type' => 'INTEGER',
            ],
            'id_caisse' => [
                'type' => 'INTEGER',
            ],
            'id_caissier' => [
                'type' => 'INTEGER',
                'null' => true,
            ],
            'date_achat' => [
                'type' => 'DATETIME',
                'null' => false,
            ],
            'statut' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'default' => 'en_cours',
            ],
        ]);

        $this->forge->addKey('id_achat', true);

        $this->forge->addForeignKey('id_client', 'client', 'id_client', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_caisse', 'caisse', 'id_caisse', 'NO ACTION', 'NO ACTION');
        $this->forge->addForeignKey('id_caissier', 'caissier', 'id_caissier', 'NO ACTION', 'NO ACTION');

        $this->forge->createTable('achat');
    }

    public function down()
    {
        $this->forge->dropTable('achat');
    }
}