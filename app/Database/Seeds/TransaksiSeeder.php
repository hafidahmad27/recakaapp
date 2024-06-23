<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TransaksiSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kode_transaksi'        => 'TRX24060001',
                'member_id'             => '1',
                'tanggal_transaksi'     => '2024-06-18 19:00:25',
                'total'                 => '10000000',
                'voucher_kode'          => 'JULICERIA',
                'catatan'               => null,
            ],
            [
                'kode_transaksi'        => 'TRX24060002',
                'member_id'             => '2',
                'tanggal_transaksi'     => '2024-07-17 02:04:21',
                'total'                 => '23500000',
                'voucher_kode'          => 'JULICERIA',
                'catatan'               => 'Packingnya amanin ya',
            ],
            [
                'kode_transaksi'        => 'TRX24060003',
                'member_id'             => '2',
                'tanggal_transaksi'     => '2024-08-17 13:21:35',
                'total'                 => '73500000',
                'voucher_kode'          => 'MERDEKAINDO78',
                'catatan'               => null,
            ],
            [
                'kode_transaksi'        => 'TRX24060004',
                'member_id'             => '4',
                'tanggal_transaksi'     => '2024-09-01 22:55:37',
                'total'                 => '90000000',
                'voucher_kode'          => 'SEPTEMBERCERIA',
                'catatan'               => 'Warna merah ya'
            ],
        ];

        // Using Query Builder
        $this->db->table('transaksi')->insertBatch($data);
    }
}
