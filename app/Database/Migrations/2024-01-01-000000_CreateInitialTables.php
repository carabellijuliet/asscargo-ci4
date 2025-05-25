<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateInitialTables extends Migration
{
    public function up()
    {
        // Tabel Users
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'nama_lengkap' => ['type' => 'VARCHAR', 'constraint' => 100],
            'username' => ['type' => 'VARCHAR', 'constraint' => 50],
            'password' => ['type' => 'VARCHAR', 'constraint' => 255],
            'handphone' => ['type' => 'VARCHAR', 'constraint' => 20],
            'lokasi' => ['type' => 'VARCHAR', 'constraint' => 100],
            'role' => ['type' => 'ENUM', 'constraint' => ['admin','staff']],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('users');

        // Tabel Drivers
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'id_driver' => ['type' => 'VARCHAR', 'constraint' => 20],
            'nama' => ['type' => 'VARCHAR', 'constraint' => 100],
            'handphone' => ['type' => 'VARCHAR', 'constraint' => 20],
            'keterangan' => ['type' => 'TEXT', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('drivers');
        
        // ... (lanjutan untuk tabel pengiriman dan status)
    }

    public function down()
    {
        $this->forge->dropTable('users');
        $this->forge->dropTable('drivers');
        // ... (tabel lainnya)
    }
}