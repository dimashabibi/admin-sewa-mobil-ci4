<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class UserController extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    //-------------------------- List User Page -------------------------------------
    public function index()
    {

        $data = [
            'title' => 'Daftar User',
            'scrumble' => 'Daftar User',
            'list_user' => $this->userModel->findAll(),
        ];

        return view('user/list_user', $data);
    }

    //-------------------------- Tambah User ------------------------------------------
    public function store()
    {
        $userModel = new UserModel();
        $userModel->insert([
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
    public function edit_user($id)
    {
        $userModel = new UserModel();
        $userModel->update($id, [
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
    public function delete_user($id)
    {
        $this->userModel->delete($id);
        session()->setFlashdata('success', 'Data berhasil dihapus.');
        return redirect()->to('/list_user');
    }
}
