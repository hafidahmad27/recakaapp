<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TransaksiDetailSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'transaksi_kode'    => 'TRX24060001',
                'nama_produk'       => 'Zircon',
                'jumlah'            => '1000',
                'harga'             => '50000000',
                'bonus'             => '1',
            ],
            [
                'transaksi_kode'    => 'TRX24060001',
                'nama_produk'       => 'Saphire',
                'jumlah'            => '2000',
                'harga'             => '75000000',
                'bonus'             => '2',
            ],
            [
                'transaksi_kode'    => 'TRX24060001',
                'nama_produk'       => 'Romeo',
                'jumlah'            => '3000',
                'harga'             => '100000000',
                'bonus'             => '3',
            ],
        ];

        // Using Query Builder
        $this->db->table('transaksi_detail')->insertBatch($data);
    }
}
