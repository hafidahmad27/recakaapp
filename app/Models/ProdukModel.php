<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table            = 'produk';
    // protected $primaryKey       = 'id';
    // protected $useAutoIncrement = true;
    // protected $returnType       = 'array';
    // protected $useSoftDeletes   = false;
    // protected $protectFields    = true;
    protected $allowedFields    = ['kode_produk', 'nama_produk', 'deskripsi', 'harga_umum', 'jumlah', 'foto_produk'];

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

    // public function generateKodeProduk()
    // {
    //     $builder = $this->db->table('produk')
    //         ->selectMax('kode_produk', 'kd_produk');

    //     $query = $builder->get()->getResultArray();

    //     if ($query > 0) {
    //         $lastKode = $query[0]['kd_produk'];
    //         $ambilKode = substr($lastKode, -3);
    //         $counter = intval($ambilKode) + 1;
    //         $kd = sprintf('%03s', $counter);
    //     } else {
    //         $kd = '001';
    //     }

    //     return 'RB-' . $kd;
    // }
}
