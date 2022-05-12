<?php

namespace Amauchar\Core\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUsersColumn extends Migration
{
    public function up()
    {
        $this->forge->addColumn('users', [
            'uuid' => [
                'type'       => 'BINARY',
                'constraint' => 16,
                'null'       => true,
                'after'      => 'id',
            ],
            'company_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => 1,
                'after'      => 'uuid',
            ],
            'first_name' => [
                'type'       => 'varchar',
                'constraint' => 255,
                'null'       => true,
                'after'      => 'username',
            ],
            'last_name' => [
                'type'       => 'varchar',
                'constraint' => 255,
                'null'       => true,
                'after'      => 'first_name',
            ],
            'avatar' => [
                'type'       => 'varchar',
                'constraint' => 255,
                'null'       => true,
                'after'      => 'last_name',
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('users', ['uuid', 'first_name', 'last_name', 'avatar']);
    }
}
