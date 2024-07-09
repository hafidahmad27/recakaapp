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
            'produk_id' => [
                'type'          => 'INT',
                'constraint'    => '9',
            ],
            'jumlah' => [
                'type'       => 'INT',
                'constraint' => '5',
            ],
        ]);
        $this->forge->addForeignKey('member_id', 'members', 'id');
        $this->forge->addForeignKey('produk_id', 'produk', 'id');
        $this->forge->createTable('keranjang');
    }

    public function down()
    {
        $this->forge->dropTable('keranjang');
    }
}
