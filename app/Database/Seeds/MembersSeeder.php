<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MembersSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 1; $i <= 5; $i++) {
            // Remove the title
            $nama_member = preg_replace('/^(Dr\.|Mr\.|Mrs\.|Ms\.|Miss)\s+/i', '', $faker->name);
            $nama_parts = explode(' ', $nama_member); // Pisahkan kata dalam nama

            $data = [
                'nama_member'     => $nama_member,
                'username'        => strtolower($nama_parts[0]), // Ambil kata pertama dan ubah ke huruf kecil
                'password'        => password_hash(strtolower($nama_parts[0]), PASSWORD_DEFAULT), // Gunakan kata pertama sebagai password
                'no_telp'         => $faker->phoneNumber,
                'member_level_id' => $faker->numberBetween(1, 3),
                'status'          => $faker->numberBetween(0, 1),
            ];

            // Using Query Builder
            $this->db->table('members')->insertBatch($data);
        }
    }
}
