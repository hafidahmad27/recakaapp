<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MembersSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 1; $i <= 20; $i++) {
            $data = [
                'nama_member'     => $faker->name,
                'username'        => $faker->text,
                'password'        => $faker->text,
                'no_telp'         => $faker->phoneNumber,
                'member_level_id' => $faker->numberBetween(1, 4),
                'status'          => $faker->numberBetween(0, 1),
            ];

            // Using Query Builder
            $this->db->table('members')->insertBatch($data);
        }
    }
}
