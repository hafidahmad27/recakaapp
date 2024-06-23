<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class CreatePembayaranTable extends Migration
{
    public function up()
    {
        $this->forge->addField('id');
        $this->forge->addField([
            'transaksi_kode' => [
                'type'       => 'VARCHAR',
                'constraint' => '11',
                'unique'     => true,
            ],
            'foto_bukti_pembayaran' => [
                'type'       => 'VARCHAR',
                'constraint' => '128',
            ],
            'status' => [
                'type'       => 'BOOLEAN',
                'null'       => true,
            ],
            'keterangan' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => true,
            ],
            'created_at' => [
                'type'       => 'TIMESTAMP',
                'default'    => new RawSql('CURRENT_TIMESTAMP'),
            ],
            'updated_at' => [
                'type'       => 'TIMESTAMP',
                'default'    => new RawSql('CURRENT_TIMESTAMP'),
            ],
        ]);
        $this->forge->addForeignKey('transaksi_kode', 'transaksi', 'kode_transaksi');
        $this->forge->createTable('pembayaran');
    }

    public function down()
    {
        $this->forge->dropTable('pembayaran');
    }
}
