<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMemberLevelsTable extends Migration
{
    public function up()
    {
        $this->forge->addField('id');
        $this->forge->addField([
            'nama_level_member' => [
                'type'       => 'VARCHAR',
                'constraint' => '6',
                'unique'     => true,
            ],
        ]);
        $this->forge->createTable('member_levels');
    }

    public function down()
    {
        $this->forge->dropTable('member_levels');
    }
}
