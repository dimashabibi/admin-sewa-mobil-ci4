<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KendaraanSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'merk_kendaraan'   => 'BMW',
            'plat_nomor'       => 'B 4444 COT',
            'tipe_kendaraan'   => 'kendaraan umum',
            'konsumsi_bbm'     => '10',
            'jadwal_service'   => '2024-06-20',
            'riwayat'          => 'Telah dipakai ke mesir',
            'status'           => 'tersedia',
        ];
        $this->db->table('kendaraan')->insert($data);
    }
}
