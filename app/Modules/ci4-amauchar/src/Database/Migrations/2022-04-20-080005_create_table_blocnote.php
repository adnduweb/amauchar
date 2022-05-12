<?php

namespace Amauchar\Core\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableBlocNote extends Migration
{
	public function up()
	{

		// Company Type
		$fields = [
			'id_blocnote'      => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
			'uuid'             => ['type' => 'BINARY', 'constraint' => 16],
			'user_id'          => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
			'blocnote_type_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
			'titre'            => ['type' => 'VARCHAR', 'constraint' => 255],
			'contenu'          => ['type' => 'TEXT'],
			'created_at'       => ['type' => 'DATETIME', 'null' => true],
			'updated_at'       => ['type' => 'DATETIME', 'null' => true],
			'deleted_at'       => ['type' => 'datetime', 'null' => true],
		];

		$this->forge->addField($fields);
		$this->forge->addKey('id_blocnote', true);
		$this->forge->addKey('created_at');
        $this->forge->addKey('updated_at');
        $this->forge->addForeignKey('user_id', 'users', 'id', false, 'CASCADE');
		$this->forge->createTable('blocnote');

		// Company Type
		$fields = [
			'id_type_blocnote'         => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
			'titre'  => ['type' => 'VARCHAR', 'constraint' => 255],
			'created_at' => ['type' => 'DATETIME', 'null' => true],
			'updated_at' => ['type' => 'DATETIME', 'null' => true],
			'deleted_at' => ['type' => 'datetime', 'null' => true],
		];

		$this->forge->addField($fields);
		$this->forge->addKey('id_type_blocnote', true);
		$this->forge->addKey('created_at');
		$this->forge->addKey('updated_at');
		$this->forge->createTable('blocnote_type');

	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('blocnote');
		$this->forge->dropTable('blocnote_type');
	}
}
