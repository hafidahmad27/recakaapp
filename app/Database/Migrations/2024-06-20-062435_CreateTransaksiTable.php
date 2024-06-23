<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class CreateTransaksiTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'kode_transaksi' => [
                'type'          => 'VARCHAR',
                'constraint'    => '11',
            ],
            'member_id' => [
                'type'          => 'INT',
                'constraint'    => '9',
            ],
            'tanggal_transaksi' => [
                'type'          => 'TIMESTAMP',
                'default'       => new RawSql('CURRENT_TIMESTAMP'),
            ],
            'total' => [
                'type'          => 'INT',
                'constraint'    => '9',
            ],
            'voucher_kode' => [
                'type'          => 'VARCHAR',
                'constraint'    => '25',
                'null'          => true,
            ],
            'catatan' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => true,
            ],
        ]);
        $this->forge->addPrimaryKey('kode_transaksi');
        $this->forge->addForeignKey('member_id', 'members', 'id');
        $this->forge->addForeignKey('voucher_kode', 'vouchers', 'kode_voucher');
        $this->forge->createTable('transaksi');
    }

    public function down()
    {
        $this->forge->dropTable('transaksi');
    }
}
