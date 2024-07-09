<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KeranjangSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 1; $i <= 5; $i++) {
            $data = [
                'member_id'     => $faker->numberBetween(1, 5),
                'produk_id'     => $faker->numberBetween(1, 5),
                'jumlah'        => $faker->randomNumber(4)
            ];

            // Using Query Builder
            $this->db->table('keranjang')->insertBatch($data);
        }
    }
}
