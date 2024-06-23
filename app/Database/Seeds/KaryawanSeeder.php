<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KaryawanSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 1; $i <= 20; $i++) {
            $data = [
                'nama_karyawan' => $faker->name,
                'no_telp'       => $faker->phoneNumber,
            ];

            // Using Query Builder
            $this->db->table('karyawan')->insertBatch($data);
        }
    }
}
