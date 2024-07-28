<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class AuthController extends BaseController
{
    protected $userModel;
    protected $session;

    public function __construct()
    {
        $userModel = new UserModel();
    }

    //-------------------------- Login Page -------------------------------------
    public function login()
    {

        if (session()->get('logged_in')) {
            return redirect()->to(base_url('/home'));
        }

        $data = [
            'title' => 'Login Page'
        ];
        return view('auth/login_page', $data);
    }


    //-------------------------- Login Proses -------------------------------------

    public function proses_login()
    {
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $userModel = new UserModel();
        $dataUser = $userModel->where('username', $username)->first();
        if ($dataUser) {
            if (password_verify($password, $dataUser['password'])) {
                session()->set([
                    'user_id'   => $dataUser['id'],
                    'nama_user' => $dataUser['nama_user'],
                    'username'  => $dataUser['username'],
                    'password'  => $dataUser['password'],
                    'logged_in' => true,
                    'role'      => $dataUser['role']
                ]);

                session()->setFlashdata('success', 'Login Berhasil');
                return redirect()->to(base_url('home'));
            } else {
                session()->setFlashdata('error', 'Login Gagal');
                return redirect()->back();
            }
        }
    }


    //-------------------------- Register Page -------------------------------------
    public function register()
    {
        $data = [
            'title' => 'Register Page'
        ];

        return view('auth/register_page', $data);
    }


    //-------------------------- Register Proses -------------------------------------

    public function proses_register()
    {
        $userModel = new UserModel();
        $userModel->insert([
            'nama_user' => $this->request->getVar('nama_user'),
            'username'  => $this->request->getVar('username'),
            'password'  => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            'email'     => $this->request->getVar('email'),
            'nohp'      => $this->request->getVar('nohp'),
            'role'      => 'admin',
        ]);
        session()->setFlashdata('success', 'Register Berhasil');
        return redirect()->to(base_url('/'));
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('/'));
    }
}
