<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class VouchersSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kode_voucher'      => 'JULICERIA',
                'nama_voucher'      => 'Voucher Diskon Bombastis',
                'diskon'            => '30',
                'tanggal_mulai'     => '2024-06-19 12:00:00',
                'tanggal_berakhir'  => '2024-06-19 23:59:59',
                'deskripsi'         => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium officiis expedita magnam aliquid neque dolor, assumenda animi suscipit itaque a dolorem necessitatibus excepturi omnis voluptatum totam autem accusantium.',
            ],
            [
                'kode_voucher'      => 'MERDEKAINDO78',
                'nama_voucher'      => 'Voucher Diskon Merdeka',
                'diskon'            => '78',
                'tanggal_mulai'     => '2024-08-17 00:00:00',
                'tanggal_berakhir'  => '2024-08-17 01:59:59',
                'deskripsi'         => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium officiis expedita magnam aliquid neque dolor, assumenda animi suscipit itaque a dolorem necessitatibus excepturi omnis voluptatum totam autem accusantium.',
            ],
            [
                'kode_voucher'      => 'SEPTEMBERCERIA',
                'nama_voucher'      => 'Voucher Diskon Fantastis',
                'diskon'            => '50',
                'tanggal_mulai'     => '2024-09-01 20:00:00',
                'tanggal_berakhir'  => '2024-09-01 20:59:59',
                'deskripsi'         => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium officiis expedita magnam aliquid neque dolor, assumenda animi suscipit itaque a dolorem necessitatibus excepturi omnis voluptatum totam autem accusantium.',
            ],
        ];

        // Using Query Builder
        $this->db->table('vouchers')->insertBatch($data);
    }
}
