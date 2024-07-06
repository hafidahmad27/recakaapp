<?php

namespace App\Models;

use CodeIgniter\Model;

class KaryawanModel extends Model
{
    protected $table            = 'karyawan';
    // protected $primaryKey       = 'id';
    // protected $useAutoIncrement = true;
    // protected $returnType       = 'array';
    // protected $useSoftDeletes   = false;
    // protected $protectFields    = true;
    protected $allowedFields    = ['nama_karyawan', 'no_telp'];

    // protected bool $allowEmptyInserts = false;
    // protected bool $updateOnlyChanged = true;

    // protected array $casts = [];
    // protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    // protected $dateFormat    = 'datetime';
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // Validation
    // protected $validationRules      = [];
    // protected $validationMessages   = [];
    // protected $skipValidation       = false;
    // protected $cleanValidationRules = true;

    // Callbacks
    // protected $allowCallbacks = true;
    // protected $beforeInsert   = [];
    // protected $afterInsert    = [];
    // protected $beforeUpdate   = [];
    // protected $afterUpdate    = [];
    // protected $beforeFind     = [];
    // protected $afterFind      = [];
    // protected $beforeDelete   = [];
    // protected $afterDelete    = [];

    public function updateKaryawanWithUser($id, $dataKaryawan, $dataUser)
    {
        $db = \Config\Database::connect();
        $builderKaryawan = $db->table('karyawan');
        $builderUsers = $db->table('users');

        // Dapatkan karyawan_id dari users berdasarkan id
        $user = $builderUsers->select('karyawan_id')->where('id', $id)->get()->getRowArray();

        if ($user) {
            // Update tabel karyawan
            $builderKaryawan->where('id', $user['karyawan_id'])->update($dataKaryawan);

            // Update tabel users
            $builderUsers->where('id', $id)->update($dataUser);
        }
    }
}
