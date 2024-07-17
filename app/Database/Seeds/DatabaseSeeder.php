<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // $this->call('MemberLevelsSeeder');
        // $this->call('MembersSeeder');
        // $this->call('ProdukSeeder');
        // $this->call('HargaSeeder');
        // $this->call('VouchersSeeder');
        // $this->call('KeranjangSeeder');
        // $this->call('TransaksiSeeder');
        // $this->call('TransaksiDetailSeeder');
        // $this->call('PembayaranSeeder');
        $this->call('KaryawanSeeder');
        $this->call('UsersSeeder');
    }
}
