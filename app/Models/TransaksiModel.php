<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table            = 'transaksi';
    protected $primaryKey       = 'kode_transaksi';
    // protected $useAutoIncrement = true;
    // protected $returnType       = 'array';
    // protected $useSoftDeletes   = false;
    // protected $protectFields    = true;
    protected $allowedFields    = ['kode_transaksi', 'member_id', 'tanggal_transaksi', 'total', 'voucher_id', 'catatan'];

    // protected bool $allowEmptyInserts = false;
    // protected bool $updateOnlyChanged = true;

    // protected array $casts = [];
    // protected array $castHandlers = [];

    // Dates
    // protected $useTimestamps = false;
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

    public function generateKodeTransaksi()
    {
        $builder = $this->db->table('transaksi')
            ->selectMax('kode_transaksi', 'kd_transaksi');

        $query = $builder->get()->getResultArray();

        $kd = '';
        if ($query > 0) {
            foreach ($query as $ck) {
                $ambilKode = substr($ck['kd_transaksi'], -4);
                $counter = intval($ambilKode) + 1;
                $kd = sprintf('%04s', $counter);
            }
        } else {
            $kd = '0001';
        }
        return 'TRX' . substr(date('Ym'), -4) . $kd;
    }
}
