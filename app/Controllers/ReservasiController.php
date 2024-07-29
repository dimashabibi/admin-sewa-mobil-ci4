<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ReservasiModel;
use CodeIgniter\HTTP\ResponseInterface;

class ReservasiController extends BaseController
{
    protected $reservasimodel;

    public function __construct()
    {
        $this->reservasimodel = new ReservasiModel();
    }

    //-------------------------- List Kendaraan Page -------------------------------------
    public function index()
    {

        $data = [
            'title' => 'Daftar Reservasi',
            'scrumble' => 'Daftar Reservasi',
            'list_reservasi' => $this->reservasimodel->getReservasi(),
        ];

        return view('reservasi/list_reservasi', $data);
    }

    //-------------------------- Tambah Kendaraan ------------------------------------------
    public function store()
    {
        $reservasimodel = new ReservasiModel();
        $reservasimodel->insert([
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
        $reservasimodel = new ReservasiModel();
        $reservasimodel->update($id, [
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
        $this->reservasimodel->delete($id);
        session()->setFlashdata('success', 'Data berhasil dihapus.');
        return redirect()->to('/list_kendaraan');
    }
}
