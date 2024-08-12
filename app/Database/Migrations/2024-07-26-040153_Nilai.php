<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Nilai extends Migration
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
                'constraint'     => '255',
                'null'           => TRUE,
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
        $this->forge->addKey(['id','id_polri'], TRUE);
        $this->forge->addForeignKey('id_polri', 'polris', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('nilais');
    }

    public function down()
    {
        $this->forge->dropTable('nilais');
    }
}
