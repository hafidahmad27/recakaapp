<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKeranjangTable extends Migration
{
    public function up()
    {
        $this->forge->addField('id');
        $this->forge->addField([
            'member_id' => [
                'type'       => 'INT',
                'constraint' => '9',
            ],
            'produk_kode' => [
                'type'       => 'VARCHAR',
                'constraint' => '6',
            ],
            'jumlah' => [
                'type'       => 'INT',
                'constraint' => '5',
            ],
        ]);
        $this->forge->addForeignKey('member_id', 'members', 'id');
        $this->forge->addForeignKey('produk_kode', 'produk', 'kode_produk');
        $this->forge->createTable('keranjang');
    }

    public function down()
    {
        $this->forge->dropTable('keranjang');
    }
}
