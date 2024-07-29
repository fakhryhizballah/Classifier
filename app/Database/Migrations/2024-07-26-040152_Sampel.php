<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Sampel extends Migration
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
                'type'           => 'INT',
                'constraint'     => '11'
            ],
            'penampilan'       => [
                'type'           => 'INT',
                'constraint'     => '11'
            ],
            'kepemimpinan'       => [
                'type'           => 'INT',
                'constraint'     => '11'
            ],
            'disiplin'       => [
                'type'           => 'INT',
                'constraint'     => '11'
            ],
            'pengendalian'       => [
                'type'           => 'INT',
                'constraint'     => '11'
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
        $this->forge->createTable('samples');
    }

    public function down()
    {
        //
        $this->forge->dropTable('samples');
    }
}
