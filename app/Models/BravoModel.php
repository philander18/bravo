<?php

namespace App\Models;

use CodeIgniter\Model;

class BravoModel extends Model
{
    protected $table = 'bravo';
    protected $allowedFields = ['nama', 'bagian', 'kelompok', 'stal1', 'stal2', 'stal3', 'pic'];
    public function akses($kode)
    {
        $where = "kode = '" . $kode . "'";
        return $this->db->table('akses')->select('akses, kode')->where($where)->get()->getResultArray();
    }
}
