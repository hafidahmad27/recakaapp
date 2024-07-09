<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'karyawan_id' => '1',
                'username' => 'admin',
                'password' => password_hash('admin', PASSWORD_DEFAULT),
                'role' => '1'
            ],
        ];

        // Using Query Builder
        $this->db->table('users')->insertBatch($data);
    }
}
