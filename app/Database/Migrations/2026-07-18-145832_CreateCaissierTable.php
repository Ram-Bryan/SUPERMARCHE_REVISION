<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCaissierTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_caissier' => [
                'type'=>'INTEGER',
                'unsigned' => true,
                'auto_increment' => true,
            ],

            'mot_de_passe' => [
                'type' => 'TEXT',
                'null' => false
            ],

            'email' => [
                "type" => 'TEXT'
            ]
        ]);

        $this->forge->addKey('id_caissier', true);
        $this->forge->createTable('caissier');
        
    }

    public function down()
    {
        $this->forge->dropTable("caissier");
    }
}
