<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PembayaranSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'transaksi_kode'        => 'TRX24060001',
                'status'                => null,
                'keterangan'            => null,
            ],
            [
                'transaksi_kode'        => 'TRX24060002',
                'status'                => 1,
                'keterangan'            => null,
            ],
            [
                'transaksi_kode'        => 'TRX24060003',
                'status'                => 0,
                'keterangan'            => 'Gambar anda tidak valid',
            ],
        ];

        // Using Query Builder
        $this->db->table('pembayaran')->insertBatch($data);
    }
}
