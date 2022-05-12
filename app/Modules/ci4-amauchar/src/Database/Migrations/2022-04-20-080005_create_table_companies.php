<?php

namespace Amauchar\Core\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableCompanies extends Migration
{
	public function up()
	{

		// Company Type
		$fields = [
			'id'         => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
			'nom_court'  => ['type' => 'VARCHAR', 'constraint' => 255],
			'nom_long'   => ['type' => 'VARCHAR', 'constraint' => 255],
			'created_at' => ['type' => 'DATETIME', 'null' => true],
			'updated_at' => ['type' => 'DATETIME', 'null' => true],
			'deleted_at' => ['type' => 'datetime', 'null' => true],
		];

		$this->forge->addField($fields);
		$this->forge->addKey('id', true);
		$this->forge->addKey('created_at');
		$this->forge->addKey('updated_at');
		$this->forge->createTable('companies_type');


		// Company
		$fields = [
			'id'              => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
			'uuid'    => ['type' => 'BINARY', 'constraint' => 16],
			'company_type_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
			'country'         => ['type' => 'VARCHAR', 'constraint' => 24],
			'raison_social'   => ['type' => 'VARCHAR', 'constraint' => 255],
			'email'           => ['type' => 'VARCHAR', 'constraint' => 255],
			'adresse'         => ['type' => 'VARCHAR', 'constraint' => 255],
			'adresse2'        => ['type' => 'VARCHAR', 'constraint' => 255],
			'ville'           => ['type' => 'VARCHAR', 'constraint' => 255],
			'code_postal'     => ['type' => 'VARCHAR', 'constraint' => 255],
			'phone'           => ['type' => 'VARCHAR', 'constraint' => 255],
			'phone_mobile'    => ['type' => 'VARCHAR', 'constraint' => 255],
			'fax'             => ['type' => 'VARCHAR', 'constraint' => 255],
			'siret'           => ['type' => 'VARCHAR', 'constraint' => 255],
			'ape'             => ['type' => 'VARCHAR', 'constraint' => 255],
			'tva'             => ['type' => 'INT', 'constraint' => 1, 'default' => 1],
			'is_ttc'          => ['type' => 'INT', 'constraint' => 1, 'default' => 0],
			'bio'             => ['type' => 'TEXT'],
			'logo'            => ['type' => 'VARCHAR', 'constraint' => 255],
			'active'          => ['type' => 'INT', 'constraint' => 11, 'default' => 1],
			'created_at'      => ['type' => 'DATETIME', 'null' => true],
			'updated_at'      => ['type' => 'DATETIME', 'null' => true],
			'deleted_at'      => ['type' => 'datetime', 'null' => true],
		];

		$this->forge->addField($fields);
		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('company_type_id', 'companies_type', 'id', false, 'CASCADE');
		$this->forge->createTable('companies');

		$fields = [
			'id_company_lang' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
			'company_id'      => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'default' => 0],
			'id_lang'         => ['type' => 'INT', 'constraint' => 11],
			'bio'             => ['type' => 'VARCHAR', 'constraint' => 255]
		];

		$this->forge->addField($fields);
		$this->forge->addKey('id_company_lang', true);
		$this->forge->addKey('id_lang');
		$this->forge->addForeignKey('company_id', 'companies', 'id', false, 'CASCADE');
		$this->forge->createTable('companies_langs', true);

	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('companies');
		$this->forge->dropTable('companies_langs');
		$this->forge->dropTable('companies_type');
	}
}
