<?php

namespace Adnduweb\Pages\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePagesBuilderModule extends Migration
{
    public function up()
    {
        $fields = [
            'id'         => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'page_id'    => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'default' => 0],
            'lang'       => ['type' => 'CHAR', 'constraint' => 48],
            'assets'     => ['type' => 'TEXT'],
            'components' => ['type' => 'TEXT'],
            'css'        => ['type' => 'TEXT'],
            'html'       => ['type' => 'TEXT'],
            'styles'     => ['type' => 'TEXT'],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
            'deleted_at' => ['type' => 'DATETIME', 'null' => true],
        ];

        $this->forge->addField($fields);
        $this->forge->addKey('id', true);
        $this->forge->addKey('lang');
        $this->forge->createTable('pages_builder', true);
    }

    //--------------------------------------------------------------------

    public function down()
    {
        $this->forge->dropTable('pages_builder');
    }
}