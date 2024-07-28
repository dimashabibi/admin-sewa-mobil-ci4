<?php

namespace App\Models;

use CodeIgniter\Model;

class KendaraanModel extends Model
{
    protected $table            = 'kendaraan';
    protected $primaryKey       = 'id';

    protected $useTimestamps    = false;
    protected $allowedFields    = ['merk_kendaraan', 'plat_nomor', 'tipe_kendaraan', 'konsumsi_bbm', 'jadwal_service', 'riwayat', 'status'];
}
