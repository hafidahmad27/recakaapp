<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProdukSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 1; $i <= 20; $i++) {
            $data = [
                'kode_produk'   => 'RB-' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'nama_produk'   => $faker->words(2, true),
                'deskripsi'     => $faker->text,
                'harga_umum'    => $faker->randomNumber(6),
                'jumlah'        => $faker->randomNumber(5),
                'foto_produk'   => $faker->imageUrl(200, 200, 'perfume', true),
            ];

            // Using Query Builder
            $this->db->table('produk')->insertBatch($data);
        }
    }
}
