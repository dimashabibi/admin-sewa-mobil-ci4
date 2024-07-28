<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KendaraanModel;
use CodeIgniter\HTTP\ResponseInterface;

class KendaraanController extends BaseController
{
    protected $kendaraanModel;

    public function __construct()
    {
        $this->kendaraanModel = new KendaraanModel();
    }

    //-------------------------- List User Page -------------------------------------
    public function index()
    {

        $data = [
            'title' => 'Daftar User',
            'scrumble' => 'Daftar User',
            'list_user' => $this->kendaraanModel->findAll(),
        ];

        return view('kendaraan/list_kendaraan', $data);
    }

    //-------------------------- Tambah User ------------------------------------------
    public function store()
    {
        $kendaraanModel = new KendaraanModel();
        $kendaraanModel->insert([
            'nama_user' => $this->request->getVar('nama_user'),
            'username'  => $this->request->getVar('username'),
            'password'  => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            'email'     => $this->request->getVar('email'),
            'nohp'      => $this->request->getVar('nohp'),
            'role'      => $this->request->getVar('role'),
        ]);
        session()->setFlashdata('success', 'Data Berhasil ditambah');
        return redirect()->to(base_url('/list_user'));
    }

    //-------------------------- Edit User ------------------------------------------
    public function edit_kendaraan($id)
    {
        $kendaraanModel = new KendaraanModel();
        $kendaraanModel->update($id, [
            'nama_user' => $this->request->getVar('nama_user'),
            'username'  => $this->request->getVar('username'),
            'password'  => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            'email'     => $this->request->getVar('email'),
            'nohp'      => $this->request->getVar('nohp'),
            'role'      => $this->request->getVar('role'),
        ]);
        session()->setFlashdata('success', 'Data berhasil diubah.');
        return redirect()->to('/list_user');
    }

    //-------------------------- Delete User ----------------------------------------
    public function delete_kendaraan($id)
    {
        $this->kendaraanModel->delete($id);
        session()->setFlashdata('success', 'Data berhasil dihapus.');
        return redirect()->to('/list_user');
    }
}
