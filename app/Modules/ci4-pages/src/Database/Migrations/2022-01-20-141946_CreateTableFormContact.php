<?php

namespace Adnduweb\Pages\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableFormContact extends Migration
{
    public function up()
    {
        $fields = [
            'id'         => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'lastname'   => ['type' => 'VARCHAR', 'constraint' => 255],
            'firstname'  => ['type' => 'VARCHAR', 'constraint' => 255],
            'email'      => ['type' => 'VARCHAR', 'constraint' => 255],
            'phone'      => ['type' => 'VARCHAR', 'constraint' => 255],
            'entreprise' => ['type' => 'VARCHAR', 'constraint' => 255],
            'fonction'   => ['type' => 'VARCHAR', 'constraint' => 255],
            'ou'         => ['type' => 'VARCHAR', 'constraint' => 255],
            'projet'     => ['type' => 'TEXT'],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
		];
		
		$this->forge->addField('id');
		$this->forge->addField($fields);

		$this->forge->addKey('id');
		$this->forge->addKey('created_at');
		$this->forge->addKey('updated_at');
		
		$this->forge->createTable('form_contact');
    }

    public function down()
    {
        $this->forge->dropTable('form_contact');
    }
}
