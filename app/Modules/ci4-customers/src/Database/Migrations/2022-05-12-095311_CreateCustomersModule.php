<?php

namespace Amauchar\Customers\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableCustomers extends Migration
{
    public function up()
    {

        // $this->forge->dropTable('customers');
        // $this->forge->dropTable('customers_addreses');
        // $this->forge->dropTable('customers_groups');
        
        $fields = [
            'id'                => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'uuid'              => ['type' => 'BINARY', 'constraint' => 16],
            'user_id'           => ['type' => 'BINARY', 'constraint' => 16],
            'customer_group_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'company'           => ['type' => 'VARCHAR', 'constraint' => 255],
            'siret'             => ['type' => 'VARCHAR', 'constraint' => 255],
            'ape'               => ['type' => 'VARCHAR', 'constraint' => 255],
            'firstname'         => ['type' => 'VARCHAR', 'constraint' => 255],
            'lastname'          => ['type' => 'VARCHAR', 'constraint' => 255],
            'email'             => ['type' => 'VARCHAR', 'constraint' => 255],
            'birthday'          => ['type' => 'VARCHAR', 'constraint' => 255],
            'optin'             => ['type' => 'INT', 'constraint' => 11],
            'active'            => ['type' => 'INT', 'constraint' => 11],
            'created_at'        => ['type' => 'DATETIME', 'null' => true],
            'updated_at'        => ['type' => 'DATETIME', 'null' => true],
            'deleted_at'        => ['type' => 'DATETIME', 'null' => true],
		];
		
		$this->forge->addField('id');
		$this->forge->addField($fields);

		$this->forge->addKey('id');
		$this->forge->addKey('created_at');
        $this->forge->addKey('updated_at');
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('customers');
        

        $fields = [
            'id'           => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'customer_id'  => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'lang'         => ['type' => 'VARCHAR', 'constraint' => 255],
            'country'      => ['type' => 'VARCHAR', 'constraint' => 255],
            'company'      => ['type' => 'VARCHAR', 'constraint' => 255],
            'firstname'    => ['type' => 'VARCHAR', 'constraint' => 255],
            'lastname'     => ['type' => 'VARCHAR', 'constraint' => 255],
            'address1'     => ['type' => 'VARCHAR', 'constraint' => 255],
            'address2'     => ['type' => 'VARCHAR', 'constraint' => 255],
            'postcode'     => ['type' => 'VARCHAR', 'constraint' => 255],
            'city'         => ['type' => 'VARCHAR', 'constraint' => 255],
            'phone'        => ['type' => 'VARCHAR', 'constraint' => 255],
            'phone_mobile' => ['type' => 'VARCHAR', 'constraint' => 255],
            'defaut'       => ['type' => 'INT', 'constraint' => 11],
            'active'       => ['type' => 'INT', 'constraint' => 11],
            'created_at'   => ['type' => 'DATETIME', 'null' => true],
            'updated_at'   => ['type' => 'DATETIME', 'null' => true],
            'deleted_at'   => ['type' => 'DATETIME', 'null' => true],
		];
		
		$this->forge->addField('id');
		$this->forge->addField($fields);

		$this->forge->addKey('id');
		$this->forge->addKey('created_at');
		$this->forge->addKey('updated_at');
        $this->forge->addForeignKey('customer_id', 'customers', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('customers_addresses');

        $fields = [
            'id'           => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'customer_id'  => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'country'      => ['type' => 'VARCHAR', 'constraint' => 255],
            'company'      => ['type' => 'VARCHAR', 'constraint' => 255],
            'firstname'    => ['type' => 'VARCHAR', 'constraint' => 255],
            'lastname'     => ['type' => 'VARCHAR', 'constraint' => 255],
            'email'        => ['type' => 'VARCHAR', 'constraint' => 255],
            'phone'        => ['type' => 'VARCHAR', 'constraint' => 255],
            'phone_mobile' => ['type' => 'VARCHAR', 'constraint' => 255],
            'created_at'   => ['type' => 'DATETIME', 'null' => true],
            'updated_at'   => ['type' => 'DATETIME', 'null' => true],
            'deleted_at'   => ['type' => 'DATETIME', 'null' => true],
		];
		
		$this->forge->addField('id');
		$this->forge->addField($fields);

		$this->forge->addKey('id');
		$this->forge->addKey('created_at');
		$this->forge->addKey('updated_at');
        $this->forge->addForeignKey('customer_id', 'customers', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('customers_contacts');

        $fields = [
			'id'      => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
			'uuid'             => ['type' => 'BINARY', 'constraint' => 16],
			'customer_id'      => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
			'blocnote_type_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
			'titre'            => ['type' => 'VARCHAR', 'constraint' => 255],
			'contenu'          => ['type' => 'TEXT'],
			'created_at'       => ['type' => 'DATETIME', 'null' => true],
			'updated_at'       => ['type' => 'DATETIME', 'null' => true],
			'deleted_at'       => ['type' => 'datetime', 'null' => true],
		];
		
		$this->forge->addField('id');
		$this->forge->addField($fields);

		$this->forge->addKey('id');
		$this->forge->addKey('created_at');
		$this->forge->addKey('updated_at');
        $this->forge->addForeignKey('customer_id', 'customers', 'id', false, true);
        $this->forge->createTable('customers_notes');



        $fields = [
            'id'           => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'name'         => ['type' => 'VARCHAR', 'constraint' => 255],
            'handle'       => ['type' => 'VARCHAR', 'constraint' => 255],
            'active'       => ['type' => 'INT', 'constraint' => 11],
            'created_at'   => ['type' => 'DATETIME', 'null' => true],
            'updated_at'   => ['type' => 'DATETIME', 'null' => true],
            'deleted_at'   => ['type' => 'DATETIME', 'null' => true],
		];
		
		$this->forge->addField('id');
		$this->forge->addField($fields);

		$this->forge->addKey('id');
		$this->forge->addKey('name');
		$this->forge->addKey('created_at');
		$this->forge->addKey('updated_at');
		
        $this->forge->createTable('customers_groups');

        
    }

    public function down()
    {
        $this->forge->dropTable('customers');
        $this->forge->dropTable('customers_addresses');
        $this->forge->dropTable('customers_groups');
    }
}
