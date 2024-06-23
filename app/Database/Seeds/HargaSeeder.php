<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class HargaSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 1; $i <= 20; $i++) {
            $data = [
                'produk_kode'       => 'RB-' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'harga_umum'        => $faker->randomNumber(6),
                'harga_khusus'      => $faker->randomNumber(6),
                'member_level_id'   => $faker->numberBetween(1, 4),
                'status'            => $faker->numberBetween(0, 1),
            ];

            // Using Query Builder
            $this->db->table('harga')->insertBatch($data);
        }
    }
}
