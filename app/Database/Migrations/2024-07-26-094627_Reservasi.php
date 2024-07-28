<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Reservasi extends Migration
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
            'nama_peminjam' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => false,
            ],
            'no_peminjaman' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => false,
            ],
            'id_driver' => [
                'type'       => 'INT',
                'constraint' => '11',
                'null'       => false,
            ],
            'id_kendaraan' => [
                'type'       => 'INT',
                'constraint' => '11',
                'null'       => false,
            ],
            'tgl_peminjaman'       => [
                'type'       => 'DATE',
                'null'       => true,
            ],
            'tujuan'       => [
                'type'       => 'TEXT',
                'null'       => true,
            ],
            'status'       => [
                'type'       => 'ENUM',
                'constraint' => ['menunggu', 'diterima', 'ditolak'],
                'null'       => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('reservasi');
    }

    public function down()
    {
        $this->forge->dropTable('reservasi');
    }
}
