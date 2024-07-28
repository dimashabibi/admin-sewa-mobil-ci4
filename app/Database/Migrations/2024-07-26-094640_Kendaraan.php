<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kendaraan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'merk_kendaraan' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => true,
            ],
            'plat_nomor'       => [
                'type'       => 'VARCHAR',
                'constraint' => '25',
                'null'       => true,
            ],
            'tipe_kendaraan'       => [
                'type'       => 'ENUM',
                'constraint' => ['pengangkut orang, pengangkut barang'],
                'null'       => true,
            ],
            'konsumsi_bbm'       => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
                'null'       => true,
            ],
            'jadwal_service'       => [
                'type'       => 'DATE',
                'null'       => true,
            ],
            'riwayat'       => [
                'type'       => 'TEXT',
                'null'       => true,
            ],
            'status_kendaraan'       => [
                'type'       => 'ENUM',
                'constraint' => ['tersedia', 'tidak tersedia'],
                'null'       => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('kendaraan');
    }

    public function down()
    {
        $this->forge->dropTable('kendaraan');
    }
}
