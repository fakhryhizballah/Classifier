<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Polri extends Migration
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
			'name'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '225',
			],
			'rank'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'nrp'      	=> [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
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
		$this->forge->createTable('polris');
    }

    public function down()
    {
        $this->forge->dropTable('polris');
    }
}
