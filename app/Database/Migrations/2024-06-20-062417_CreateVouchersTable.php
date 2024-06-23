<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateVouchersTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'kode_voucher' => [
                'type'          => 'VARCHAR',
                'constraint'    => '25',
            ],
            'nama_voucher' => [
                'type'          => 'VARCHAR',
                'constraint'    => '50',
            ],
            'diskon' => [
                'type'          => 'INT',
                'constraint'    => '3',
            ],
            'tanggal_mulai' => [
                'type'          => 'DATETIME',
            ],
            'tanggal_berakhir' => [
                'type'          => 'DATETIME',
            ],
            'deskripsi' => [
                'type'          => 'VARCHAR',
                'constraint'    => '255',
            ],
        ]);
        $this->forge->addPrimaryKey('kode_voucher');
        $this->forge->createTable('vouchers');
    }

    public function down()
    {
        $this->forge->dropTable('vouchers');
    }
}
