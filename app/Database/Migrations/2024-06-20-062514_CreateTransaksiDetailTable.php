<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTransaksiDetailTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'transaksi_kode' => [
                'type'       => 'VARCHAR',
                'constraint' => '11',
            ],
            'nama_produk' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'jumlah' => [
                'type'       => 'INT',
                'constraint' => '5',
            ],
            'harga' => [
                'type'       => 'INT',
                'constraint' => '9',
            ],
            'bonus' => [
                'type'       => 'INT',
                'constraint' => '1',
            ],
        ]);
        $this->forge->addForeignKey('transaksi_kode', 'transaksi', 'kode_transaksi');
        $this->forge->createTable('transaksi_detail');
    }

    public function down()
    {
        $this->forge->dropTable('transaksi_detail');
    }
}
