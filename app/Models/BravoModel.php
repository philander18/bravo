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

    public function list_bravo()
    {
        $list_bravo = $this->db->table('peserta')->select('kelompok')->distinct('kelompok')->orderBy('kelompok', 'asc')->get()->getResultArray();
        $data['list_bravo'] = $list_bravo;
        $data['select_bravo'] = $list_bravo[0]['kelompok'];
        return $data;
    }

    public function search_peserta($keyword, $jumlahlist, $index, $order, $kelompok)
    {
        if ($kelompok == 'All') {
            $where = "nama like '%" . $keyword . "%'";
        } else {
            $where = "nama like '%" . $keyword . "%' and kelompok = '" . $kelompok . "'";
        }
        $select = "id, nama, bagian, kelompok, stal1, stal2, stal3";
        $all = $this->db->table('peserta')->select($select)->where($where)->orderBy($order)->get()->getResultArray();
        $jumlahdata = count($all);
        $lastpage = ceil($jumlahdata / $jumlahlist);
        $tabel = array_splice($all, $index);
        array_splice($tabel, $jumlahlist);
        $data['lastpage'] = $lastpage;
        $data['tabel'] = $tabel;
        $data['jumlah'] = $jumlahdata;
        return $data;
    }
    function update_stal1($id, $data)
    {
        return $this->db->table('peserta')->where('id', $id)->update($data);
    }
    function update_stal2($id, $data)
    {
        return $this->db->table('peserta')->where('id', $id)->update($data);
    }
    function update_stal3($id, $data)
    {
        return $this->db->table('peserta')->where('id', $id)->update($data);
    }
    public function get_peserta_byid($id)
    {
        return $this->db->table('peserta')->select("*")->where('id', $id)->get()->getResultArray();
    }
}
