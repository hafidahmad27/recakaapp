<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class CreateProdukTable extends Migration
{
    public function up()
    {
        $this->forge->addField('id');
        $this->forge->addField([
            'kode_produk' => [
                'type'       => 'VARCHAR',
                'constraint' => '6',
                'unique'     => true,
            ],
            'nama_produk' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'unique'     => true,
            ],
            'deskripsi' => [
                'type'       => 'TEXT',
            ],
            'harga_umum' => [
                'type'       => 'INT',
                'constraint' => '9',
            ],
            'jumlah' => [
                'type'       => 'INT',
                'constraint' => '5',
            ],
            'foto_produk' => [
                'type'       => 'VARCHAR',
                'constraint' => '128',
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
        $this->forge->createTable('produk');
    }

    public function down()
    {
        $this->forge->dropTable('produk');
    }
}
