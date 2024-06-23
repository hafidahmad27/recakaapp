<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MemberLevelsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_level_member' => 'Umum',
            ],
            [
                'nama_level_member' => 'Bronze',
            ],
            [
                'nama_level_member' => 'Silver',
            ],
            [
                'nama_level_member' => 'Gold',
            ],
        ];

        // Using Query Builder
        $this->db->table('member_levels')->insertBatch($data);
    }
}
