<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateClientTable extends Migration
{
    public function up()
    {
        $this->forge->addField( [
            'id_client' => [
                'type' => 'INTEGER',
                'unsigned' => true,
                'auto_increment' => true,
            ],

            'nom' => [
                'type' => 'TEXT',
                'null' => true
            ]
        ]);

        $this->forge->addKey('id_client', true);
        $this->forge->createTable('client');
            
    }

    public function down()
    {
        $this->forge->dropTable('client');
    }
}
