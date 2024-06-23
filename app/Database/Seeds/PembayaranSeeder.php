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
                'foto_bukti_pembayaran' => 'x',
                'status'                => null,
                'keterangan'            => null,
            ],
            [
                'transaksi_kode'        => 'TRX24060002',
                'foto_bukti_pembayaran' => 'x',
                'status'                => 1,
                'keterangan'            => null,
            ],
            [
                'transaksi_kode'        => 'TRX24060003',
                'foto_bukti_pembayaran' => 'x',
                'status'                => 0,
                'keterangan'            => 'Gambar anda tidak valid',
            ],
        ];

        // Using Query Builder
        $this->db->table('pembayaran')->insertBatch($data);
    }
}
