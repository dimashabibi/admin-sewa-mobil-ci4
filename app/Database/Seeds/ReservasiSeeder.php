<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ReservasiSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'nama_peminjam'    => 'nasrul',
            'no_peminjaman'    => 'NP-001',
            'id_driver'        => '1',
            'id_kendaraan'     => '1',
            'tgl_peminjaman'   => '2020-01-02',
            'tgl_selesai'      => '2020-03-02',
            'tujuan'           => 'arab',
            'status'           => 'selesai',
        ];
        $this->db->table('reservasi')->insert($data);
    }
}
