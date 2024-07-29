<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ReservasiModel;
use App\Models\DriverModel;
use App\Models\KendaraanModel;
use CodeIgniter\HTTP\ResponseInterface;

class ReservasiController extends BaseController
{
    protected $reservasimodel;
    protected $kendaraanModel;
    protected $driverModel;

    public function __construct()
    {
        $this->reservasimodel = new ReservasiModel();
        $this->kendaraanModel = new KendaraanModel();
        $this->driverModel = new DriverModel();
    }

    //-------------------------- List Reservasi Page -------------------------------------
    public function index()
    {

        $data = [
            'title' => 'Daftar Reservasi',
            'scrumble' => 'Daftar Reservasi',
            'list_reservasi' => $this->reservasimodel->getReservasi(),
        ];

        return view('reservasi/list_reservasi', $data);
    }

    //-------------------------- List Reservasi Page -------------------------------------
    public function approver_reservasi()
    {

        $data = [
            'title' => 'Daftar Reservasi',
            'scrumble' => 'Daftar Reservasi',
            'list_reservasi' => $this->reservasimodel->getReservasi(),
        ];

        return view('reservasi/list_reservasi_approver', $data);
    }

    //-------------------------- Tambah Reservasi ------------------------------------------

    public function create_reservasi()
    {
        $data = [
            'title' => 'Form Reservasi',
            'scrumble' => 'Form Reservasi',
            'list_reservasi' => $this->reservasimodel->getReservasi(),
            'kendaraan' => $this->kendaraanModel->where('status', 'tersedia')->findAll(),
            'driver' => $this->driverModel->where('status', 'tersedia')->findAll(),
            'no_peminjaman' => $this->reservasimodel->getNoPeminjaman(),
        ];
        return view('reservasi/create_reservasi', $data);
    }

    public function store()
    {
        $reservasiModel = new ReservasiModel();
        $reservasiModel->insert([
            'nama_peminjam'  => $this->request->getVar('nama_peminjam'),
            'no_peminjaman'  => $this->request->getVar('no_peminjaman'),
            'nohp'           => $this->request->getVar('nohp'),
            'id_driver'      => $this->request->getVar('id_driver'),
            'id_kendaraan'   => $this->request->getVar('id_kendaraan'),
            'tgl_peminjaman' => $this->request->getVar('tgl_peminjaman'),
            'tgl_selesai'    => $this->request->getVar('tgl_selesai'),
            'tujuan'         => $this->request->getVar('tujuan'),
            'status'         => 'menunggu',
        ]);
        session()->setFlashdata('success', 'Data Berhasil ditambah');
        return redirect()->to(base_url('/list_reservasi'));
    }

    //-------------------------- Edit reservasi ------------------------------------------
    public function edit_reservasi($id)
    {
        $reservasimodel = new ReservasiModel();
        $reservasimodel->update($id, [
            'nama_peminjam'  => $this->request->getVar('nama_peminjam'),
            'no_peminjaman'  => $this->request->getVar('no_peminjaman'),
            'nohp'           => $this->request->getVar('nohp'),
            'id_driver'      => $this->request->getVar('id_driver'),
            'id_kendaraan'   => $this->request->getVar('id_kendaraan'),
            'tgl_peminjaman' => $this->request->getVar('tgl_peminjaman'),
            'tgl_selesai'    => $this->request->getVar('tgl_selesai'),
            'tujuan'         => $this->request->getVar('tujuan'),
            'status'         => $this->request->getVar('status'),
        ]);
        session()->setFlashdata('success', 'Data berhasil diubah.');
        return redirect()->to('/list_reservasi');
    }

    //-------------------------- Delete Reservasi ----------------------------------------
    public function delete_kendaraan($id)
    {
        $this->reservasimodel->delete($id);
        session()->setFlashdata('success', 'Data berhasil dihapus.');
        return redirect()->to('/list_reservasi');
    }

    //-------------------------- Terima Reservasi ------------------------------------------
    public function terima_approver($id)
    {
        $reservasimodel = new ReservasiModel();
        $data['reservasi'] = $reservasimodel->where('id', $id)->first();

        $reservasimodel->update($id, [
            'status'  => 'disetujui'
        ]);
        session()->setFlashdata('success', 'Reservasi berhasil disetujui');
        return redirect()->to('/list_reservasi_approver');
    }

    //-------------------------- Tolak Reservasi ------------------------------------------
    public function tolak_approver($id)
    {
        $reservasimodel = new ReservasiModel();
        $data['reservasi'] = $reservasimodel->where('id', $id)->first();

        $reservasimodel->update($id, [
            'status'  => 'ditolak',
        ]);
        session()->setFlashdata('success', 'Reservasi berhasil ditolak');
        return redirect()->to('/list_reservasi_approver');
    }

    //-------------------------- Terima Reservasi ------------------------------------------
    public function terima($id)
    {
        $reservasimodel = new ReservasiModel();
        $data['reservasi'] = $reservasimodel->where('id', $id)->first();

        $reservasimodel->update($id, [
            'status'  => 'diterima',
        ]);
        session()->setFlashdata('success', 'Reservasi berhasil diterima');
        return redirect()->to('/list_reservasi');
    }

    //-------------------------- Tolak Reservasi ------------------------------------------
    public function tolak($id)
    {
        $reservasimodel = new ReservasiModel();
        $data['reservasi'] = $reservasimodel->where('id', $id)->first();

        $reservasimodel->update($id, [
            'status'  => 'ditolak',
        ]);
        session()->setFlashdata('success', 'Reservasi berhasil ditolak');
        return redirect()->to('/list_reservasi');
    }

    //-------------------------- Tolak Reservasi ------------------------------------------
    public function selesai($id)
    {
        $reservasimodel = new ReservasiModel();
        $data['reservasi'] = $reservasimodel->where('id', $id)->first();

        $reservasimodel->update($id, [
            'status'  => 'selesai',
        ]);
        session()->setFlashdata('success', 'Reservasi berhasil diselesaikan');
        return redirect()->to('/list_reservasi');
    }
}
