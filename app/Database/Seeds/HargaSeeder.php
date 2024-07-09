<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class HargaSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 1; $i <= 5; $i++) {
            $data = [
                'produk_id'         => $faker->numberBetween(1, 5),
                'harga_khusus'      => $faker->randomNumber(6),
                'member_level_id'   => $faker->numberBetween(1, 3),
                'status'            => $faker->numberBetween(0, 1),
            ];

            // Using Query Builder
            $this->db->table('harga')->insertBatch($data);
        }
    }
}
