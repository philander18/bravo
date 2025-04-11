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
        }
        $data = [
            'judul' => 'Beranda',
            'akses' => $session->akses
        ];
        return view('Home/index', $data);
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
}
