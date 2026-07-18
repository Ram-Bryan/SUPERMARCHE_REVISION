<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAchatTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_achat' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_client' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => false,
            ],
            'id_caisse' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => false,
            ],
            'id_caissier' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => true,
            ],
            'date_achat' => [
                'type'       => 'DATETIME',
                'null'       => false,
                'default'    => date('Y-m-d H:i:s'),
            ],
            'statut' => [
                'type'       => 'ENUM',
                'constraint' => ['en_cours', 'cloture'],
                'null'       => false,
                'default'    => 'en_cours',
            ],
        ]);
        $this->forge->addKey('id_achat', true);
        $this->forge->addForeignKey('id_caisse', 'caisse', 'id_caisse');
        $this->forge->addForeignKey('id_caissier', 'caissier', 'id_caissier');
        $this->forge->addForeignKey('id_client', 'client', 'id_client', 'CASCADE');
        $this->forge->createTable('achat');
    }

    public function down()
    {
        $this->forge->dropTable('achat');
    }
}