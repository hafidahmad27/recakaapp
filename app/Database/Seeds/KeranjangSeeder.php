<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KeranjangSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 1; $i <= 20; $i++) {
            $data = [
                'member_id'     => $faker->numberBetween(1, 20),
                'produk_kode'   => 'RB-' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'jumlah'        => $faker->randomNumber(4)
            ];

            // Using Query Builder
            $this->db->table('keranjang')->insertBatch($data);
        }
    }
}
