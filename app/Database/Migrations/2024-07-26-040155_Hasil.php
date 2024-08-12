<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Label extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'id_polri'       => [
                'type'           => 'INT',
                'constraint'     => '11',
                'unique'         => TRUE,
                'unsigned'       => true,
                'null'           => true,


            ],
            'dt'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'nb'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'created_at'       => [
                'type'           => 'DATETIME',
                'null'           => TRUE,
            ],
            'updated_at'       => [
                'type'           => 'DATETIME',
                'null'           => TRUE,
            ],
        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('hasils');
    }

    public function down()
    {
        //
        $this->forge->dropTable('hasils');
    }
}
