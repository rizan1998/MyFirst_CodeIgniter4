<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Orang extends Migration
{
	public function up() //method up adalah method yang digunakan untuk membuat skema database
	{
		//disini membuat sekema tabel yang akan dibuat

		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true, // agar angkanya positiv terus
				'auto_increment' => true, // AI
			],
			'nama'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'alamat'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'created_at'       => [
				'type'           => 'DATETIME',
				'null' => TRUE
			],

			'update_at'       => [
				'type'           => 'DATETIME',
				'null' => TRUE
			]
		]);
		$this->forge->addKey('id', true); //primary key nya adalah id
		$this->forge->createTable('orang'); //nama table
	}

	//--------------------------------------------------------------------

	public function down() //method down digunakan untuk menghapus database
	{
		//
		$this->forge->dropTable('orang');
	}
}
