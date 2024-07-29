<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DriverSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'nama_driver'   => 'muhammad alfi',
            'nohp'          => '0891232134',
            'status'        => 'tersedia',
        ];
        $this->db->table('driver')->insert($data);
    }
}
