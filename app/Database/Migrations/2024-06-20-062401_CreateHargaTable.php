<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateHargaTable extends Migration
{
    public function up()
    {
        $this->forge->addField('id');
        $this->forge->addField([
            'produk_kode' => [
                'type'       => 'VARCHAR',
                'constraint' => '6',
            ],
            'harga_umum' => [
                'type'       => 'INT',
                'constraint' => '9',
            ],
            'harga_khusus' => [
                'type'       => 'INT',
                'constraint' => '9',
            ],
            'member_level_id' => [
                'type'       => 'INT',
                'constraint' => '9',
            ],
            'status' => [
                'type'       => 'BOOLEAN',
                'default'    => '1',
            ],
        ]);
        $this->forge->addForeignKey('produk_kode', 'produk', 'kode_produk');
        $this->forge->addForeignKey('member_level_id', 'member_levels', 'id');
        $this->forge->createTable('harga');
    }

    public function down()
    {
        $this->forge->dropTable('harga');
    }
}
