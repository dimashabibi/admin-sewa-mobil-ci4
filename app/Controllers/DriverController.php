<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DriverModel;
use CodeIgniter\HTTP\ResponseInterface;

class DriverController extends BaseController
{
    protected $driverModel;

    public function __construct()
    {
        $this->driverModel = new DriverModel();
    }

    //-------------------------- List Kendaraan Page -------------------------------------
    public function index()
    {

        $data = [
            'title'       => 'Daftar Driver',
            'scrumble'    => 'Daftar Driver',
            'list_driver' => $this->driverModel->findAll(),
        ];

        return view('driver/list_driver', $data);
    }

    //-------------------------- List Kendaraan approver Page -------------------------------------
    public function approver_driver()
    {

        $data = [
            'title'       => 'Daftar Driver',
            'scrumble'    => 'Daftar Driver',
            'list_driver' => $this->driverModel->findAll(),
        ];

        return view('driver/list_driver_approver', $data);
    }

    //-------------------------- Tambah Kendaraan ------------------------------------------
    public function store()
    {
        $driverModel = new DriverModel();
        $driverModel->insert([
            'nama_driver'  => $this->request->getVar('nama_driver'),
            'nohp'         => $this->request->getVar('nohp'),
            'status'       => $this->request->getVar('status'),
        ]);
        session()->setFlashdata('success', 'Data Berhasil ditambah');
        return redirect()->to(base_url('/list_driver'));
    }

    //-------------------------- Edit Kendaraan ------------------------------------------
    public function edit_driver($id)
    {
        $driverModel = new DriverModel();
        $driverModel->update($id, [
            'nama_driver'  => $this->request->getVar('nama_driver'),
            'nohp'         => $this->request->getVar('nohp'),
            'status'       => $this->request->getVar('status'),
        ]);
        session()->setFlashdata('success', 'Data berhasil diubah.');
        return redirect()->to('/list_driver');
    }

    //-------------------------- Delete Kendaraan ----------------------------------------
    public function delete_driver($id)
    {
        $this->driverModel->delete($id);
        session()->setFlashdata('success', 'Data berhasil dihapus.');
        return redirect()->to('/list_driver');
    }
}
