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

    //-------------------------- List Kendaraan Page -------------------------------------
    public function index()
    {

        $data = [
            'title' => 'Daftar Kendaraan',
            'scrumble' => 'Daftar Kendaraan',
            'list_kendaraan' => $this->kendaraanModel->findAll(),
        ];

        return view('kendaraan/list_kendaraan', $data);
    }

    //-------------------------- Tambah Kendaraan ------------------------------------------
    public function store()
    {
        $kendaraanModel = new KendaraanModel();
        $kendaraanModel->insert([
            'merk_kendaraan'  => $this->request->getVar('merk_kendaraan'),
            'plat_nomor'      => $this->request->getVar('plat_nomor'),
            'tipe_kendaraan'  => $this->request->getVar('tipe_kendaraan'),
            'konsumsi_bbm'    => $this->request->getVar('konsumsi_bbm'),
            'jadwal_service'  => $this->request->getVar('jadwal_service'),
            'riwayat'         => $this->request->getVar('riwayat'),
            'status'          => $this->request->getVar('status'),
        ]);
        session()->setFlashdata('success', 'Data Berhasil ditambah');
        return redirect()->to(base_url('/list_kendaraan'));
    }

    //-------------------------- Edit Kendaraan ------------------------------------------
    public function edit_kendaraan($id)
    {
        $kendaraanModel = new KendaraanModel();
        $kendaraanModel->update($id, [
            'merk_kendaraan'  => $this->request->getVar('merk_kendaraan'),
            'plat_nomor'      => $this->request->getVar('plat_nomor'),
            'tipe_kendaraan'  => $this->request->getVar('tipe_kendaraan'),
            'konsumsi_bbm'    => $this->request->getVar('konsumsi_bbm'),
            'jadwal_service'  => $this->request->getVar('jadwal_service'),
            'riwayat'         => $this->request->getVar('riwayat'),
            'status'          => $this->request->getVar('status'),
        ]);
        session()->setFlashdata('success', 'Data berhasil diubah.');
        return redirect()->to('/list_kendaraan');
    }

    //-------------------------- Delete Kendaraan ----------------------------------------
    public function delete_kendaraan($id)
    {
        $this->kendaraanModel->delete($id);
        session()->setFlashdata('success', 'Data berhasil dihapus.');
        return redirect()->to('/list_kendaraan');
    }
}
