<?php

namespace Amauchar\Pages\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePagesComposerModule extends Migration
{
    public function up()
    {
        $fields = [
            'id_page_composer' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'page_id'          => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'default' => 0],
            'lang'             => ['type' => 'CHAR', 'constraint' => 48],
            'items'            => ['type' => 'TEXT'],
            'created_at'       => ['type' => 'DATETIME', 'null' => true],
            'updated_at'       => ['type' => 'DATETIME', 'null' => true],
            'deleted_at'       => ['type' => 'DATETIME', 'null' => true],
        ];

        $this->forge->addField($fields);
        $this->forge->addKey('id_page_composer', true);
        $this->forge->addKey('lang');
        $this->forge->createTable('pages_composer', true);
    }

    //--------------------------------------------------------------------

    public function down()
    {
        $this->forge->dropTable('pages_composer');
    }
}