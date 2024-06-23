<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class CreateUsersTable extends Migration
{
    public function up()
    {
        $this->forge->addField('id');
        $this->forge->addField([
            'karyawan_id' => [
                'type'       => 'INT',
                'constraint' => '9',
                'unique'     => true,
            ],
            'username' => [
                'type'       => 'VARCHAR',
                'constraint' => '25',
            ],
            'password' => [
                'type'       => 'CHAR',
                'constraint' => '60',
            ],
            'role' => [
                'type'       => 'INT',
                'constraint' => '1',
            ],
            'status' => [
                'type'       => 'BOOLEAN',
                'default'    => '1',
            ],
            'created_at' => [
                'type' => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
            'updated_at' => [
                'type' => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
        ]);
        $this->forge->addForeignKey('karyawan_id', 'karyawan', 'id');
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
