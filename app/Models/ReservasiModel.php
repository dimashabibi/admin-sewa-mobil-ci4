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
        $query   = $builder->get();
        return $query->getResultArray();
    }
}
