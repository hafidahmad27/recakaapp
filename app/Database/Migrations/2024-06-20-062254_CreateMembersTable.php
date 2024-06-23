<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class CreateMembersTable extends Migration
{
    public function up()
    {
        $this->forge->addField('id');
        $this->forge->addField([
            'nama_member' => [
                'type'          => 'VARCHAR',
                'constraint'    => '50',
                'unique'        => true,
            ],
            'username' => [
                'type'       => 'VARCHAR',
                'constraint' => '25',
            ],
            'password' => [
                'type'       => 'CHAR',
                'constraint' => '60',
            ],
            'no_telp' => [
                'type'          => 'VARCHAR',
                'constraint'    => '14',
            ],
            'member_level_id' => [
                'type'          => 'INT',
                'constraint'    => '9',
                'null'          => true,
            ],
            'status' => [
                'type'          => 'BOOLEAN',
                'default'       => '1',
            ],
            'created_at' => [
                'type'          => 'TIMESTAMP',
                'default'       => new RawSql('CURRENT_TIMESTAMP'),
            ],
            'updated_at' => [
                'type'       => 'TIMESTAMP',
                'default'    => new RawSql('CURRENT_TIMESTAMP'),
            ],
        ]);
        $this->forge->addForeignKey('member_level_id', 'member_levels', 'id');
        $this->forge->createTable('members');
    }

    public function down()
    {
        $this->forge->dropTable('members');
    }
}
