<?php

namespace App\Models;

use CodeIgniter\Database\Query;
use CodeIgniter\Model;

class ReservasiModel extends Model
{
    protected $table            = 'reservasi';
    protected $primaryKey       = 'id';

    protected $useTimestamps    = false;
    protected $allowedFields    = [
        'nama_peminjam', 'no_peminjaman', 'nohp', 'id_driver', 'id_kendaraan',
        'tgl_peminjaman', 'tgl_selesai', 'tujuan', 'status'
    ];

    public function getReservasi()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('reservasi');
        $builder->select('reservasi.*, kendaraan.merk_kendaraan, driver.nama_driver');
        $builder->join('kendaraan', 'kendaraan.id = reservasi.id_kendaraan');
        $builder->join('driver', 'driver.id = reservasi.id_driver');
        $builder->orderBy('reservasi.id', 'DESC');
        $query   = $builder->get();
        return $query->getResultArray();
    }
    
    public function getNoPeminjaman()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('reservasi');
        $builder->select('RIGHT(reservasi.no_peminjaman, 3) as no_peminjaman');
        $builder->orderBy('no_peminjaman', 'DESC');
        $builder->limit(1);
        $query   = $builder->get();

        if ($query->getFieldCount() <> 0) {
            $data = $query->getRow();
            $no   = intval($data->no_peminjaman) + 1;
        } else {
            $no = 1;
        }

        $batas = str_pad($no, 3, "0", STR_PAD_LEFT);
        $kodeTampil  = "NP-" . $batas;
        return $kodeTampil;

        return $query->getResultArray();
    }

    public function updateVehicleStatus($id_kendaraan)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('kendaraan');
        $builder->where('id', $id_kendaraan);
        $builder->update(['status' => 'tidak tersedia']);
    }
}
