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
            'moral'       => [
                'type'           => 'DOUBLE',
            ],
            'penampilan'       => [
                'type'           => 'DOUBLE',
            ],
            'kepemimpinan'       => [
                'type'           => 'DOUBLE',
            ],
            'disiplin'       => [
                'type'           => 'DOUBLE',
            ],
            'pengendalian'       => [
                'type'           => 'DOUBLE',
            ],
            'label'       => [
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
        $this->forge->createTable('labels');
    }

    public function down()
    {
        //
        $this->forge->dropTable('labels');
    }
}
