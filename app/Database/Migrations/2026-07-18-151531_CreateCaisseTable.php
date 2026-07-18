<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCaisseTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_caisse' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'numero' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => false,
            ],
            'libelle' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
        ]);
        $this->forge->addKey('id_caisse', true);
        $this->forge->createTable('caisse');
    }

    public function down()
    {
        $this->forge->dropTable('caisse');
    }
}