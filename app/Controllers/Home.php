<?php

namespace App\Controllers;

use App\Models\BravoModel;

class Home extends BaseController
{
    protected $BravoModel;
    protected $jumlahlist = 10;
    public function __construct()
    {
        $this->BravoModel = new BravoModel();
    }
    public function index()
    {
        $session = session();
        if (!$session->has('akses')) {
            return redirect()->to('Home/portal');
            exit;
        }
        $page = 1;
        $kolom_peserta = 'nama';
        $sort_peserta = 'ASC';
        $order_peserta = $kolom_peserta . ' ' . $sort_peserta;
        $data = [
            'judul' => 'Beranda',
            'akses' => $session->akses,
            'list_bravo' => $this->BravoModel->list_bravo(),
            'peserta' => $this->BravoModel->search_peserta("", $this->jumlahlist, 0, $order_peserta, 'All')['tabel'],
            'pagination_peserta' => $this->pagination($page, $this->BravoModel->search_peserta("", $this->jumlahlist, 0, $order_peserta, 'All')['lastpage']),
            'last_peserta' => $this->BravoModel->search_peserta("", $this->jumlahlist, 0, $order_peserta, 'All')['lastpage'],
            'jumlah_peserta' => $this->BravoModel->search_peserta("", $this->jumlahlist, 0, $order_peserta, 'All')['jumlah'],
            'page' => $page,
            'kolom_peserta' => $kolom_peserta,
            'sort_peserta' => $sort_peserta,
        ];
        return view('Home/index', $data);
    }

    public function refresh_tabel_peserta()
    {
        $session = session();
        if (isset($_POST['keyword'])) {
            $keyword = $_POST['keyword'];
        } else {
            $keyword = '';
        }
        $page = $_POST['page'];
        if ($page == 1) {
            $index = 0;
        } else {
            $index = ($page - 1) * $this->jumlahlist;
        }
        $kolom_peserta = $_POST['kolom'];
        $sort_peserta = $_POST['sort'];
        $order_peserta = $kolom_peserta . ' ' . $sort_peserta;
        $kelompok = $_POST['kelompok'];
        $data = [
            'peserta' => $this->BravoModel->search_peserta($keyword, $this->jumlahlist, $index, $order_peserta, $kelompok)['tabel'],
            'pagination_peserta' => $this->pagination($page, $this->BravoModel->search_peserta($keyword, $this->jumlahlist, $index, $order_peserta, $kelompok)['lastpage']),
            'last_peserta' => $this->BravoModel->search_peserta($keyword, $this->jumlahlist, $index, $order_peserta, $kelompok)['lastpage'],
            'jumlah_peserta' => $this->BravoModel->search_peserta($keyword, $this->jumlahlist, $index, $order_peserta, $kelompok)['jumlah'],
            'page' => $page,
            'kolom_peserta' => $kolom_peserta,
            'sort_peserta' => $sort_peserta,
            'akses' => $session->akses,
        ];
        return view('Home/Ajax/peserta', $data);
    }

    public function update_stal1()
    {
        $id = $_POST['id'];
        $data = [
            'stal1' => $_POST['stal1'],
        ];
        $this->BravoModel->update_stal1($id, $data);
    }
    public function update_stal2()
    {
        $id = $_POST['id'];
        $data = [
            'stal2' => $_POST['stal2'],
        ];
        $this->BravoModel->update_stal2($id, $data);
    }
    public function update_stal3()
    {
        $id = $_POST['id'];
        $data = [
            'stal3' => $_POST['stal3'],
        ];
        $this->BravoModel->update_stal3($id, $data);
    }

    public function portal()
    {
        $session = session();
        if (!is_null($this->request->getVar('kode'))) {
            if (!empty($this->BravoModel->akses($this->request->getVar('kode')))) {
                $session->set('akses', $this->BravoModel->akses($this->request->getVar('kode'))[0]['akses']);
            } else {
                session()->setFlashdata('notifikasi', 'Kode tidak terdaftar.');
            }
        }
        if ($session->has('akses')) {
            return redirect()->to('Home');
            exit;
        }
        $data = [
            'judul' => 'Portal',
            'akses' => $session->akses
        ];
        return view('Portal/index', $data);
    }
    public function keluar()
    {
        $session = session();
        $session->remove('akses');
        return redirect()->to('Home/portal');
        exit;
    }

    public function get_detail_peserta()
    {
        $data = [
            'peserta' => $this->BravoModel->get_peserta_byid($_POST['id'])[0],
        ];
        return view('Home/Ajax/detail_peserta', $data);
    }
    public function pagination($page, $lastpage)
    {
        $pagination = [
            'first' => false,
            'previous' => false,
            'next' => false,
            'last' => false
        ];
        if ($lastpage == 1) {
            $pagination['number'] = [1];
        } elseif ($lastpage == 2) {
            $pagination['number'] = [1, 2];
        } elseif ($lastpage == 3) {
            $pagination['number'] = [1, 2, 3];
        } elseif ($lastpage == 4) {
            $pagination['number'] = [1, 2, 3, 4];
        } elseif ($lastpage == 5) {
            $pagination['number'] = [1, 2, 3, 4, 5];
        } else {
            if ($page >= 1 and $page <= 3) {
                $pagination['next'] = true;
                $pagination['last'] = true;
                $pagination['number'] = [1, 2, 3];
            } elseif ($page >= $lastpage - 2 and $page <= $lastpage) {
                $pagination['first'] = true;
                $pagination['previous'] = true;
                $pagination['number'] = [$lastpage - 2, $lastpage - 1, $lastpage];
            } else {
                $pagination['first'] = true;
                $pagination['previous'] = true;
                $pagination['next'] = true;
                $pagination['last'] = true;
                $pagination['number'] = [$page - 1, $page, $page + 1];
            }
        };
        $pagination['page'] = $page;
        return $pagination;
    }
}
