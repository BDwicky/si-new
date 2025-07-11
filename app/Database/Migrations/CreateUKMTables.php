<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUKMTables extends Migration
{
    public function up()
    {
        // === TABEL USER ===
        $this->forge->addField([
            'id_user' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'nim' => [
                'type' => 'VARCHAR',
                'constraint' => '20'
            ],
            'nama_lengkap' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'no_telp' => [
                'type' => 'VARCHAR',
                'constraint' => '20'
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true
            ]
        ]);
        $this->forge->addKey('id_user', true);
        $this->forge->createTable('user');

        // === TABEL ADMIN ===
        $this->forge->addField([
            'id_admin' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => '50'
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true
            ]
        ]);
        $this->forge->addKey('id_admin', true);
        $this->forge->createTable('admin');

        // === TABEL SUPER ADMIN ===
        $this->forge->addField([
            'id_super_admin' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => '50'
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true
            ]
        ]);
        $this->forge->addKey('id_super_admin', true);
        $this->forge->createTable('super_admin');

        // === TABEL UKM ===
        $this->forge->addField([
            'id_ukm' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'nama_ukm' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'id_kepengurusan' => [
                'type' => 'INT',
                'unsigned' => true,
                'null' => true
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true
            ]
        ]);
        $this->forge->addKey('id_ukm', true);
        $this->forge->createTable('ukm');

        // === TABEL JABATAN ===
        $this->forge->addField([
            'id_jabatan' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'nama_jabatan' => [
                'type' => 'VARCHAR',
                'constraint' => '50'
            ],
            'id_ukm' => [
                'type' => 'INT',
                'unsigned' => true
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true
            ]
        ]);
        $this->forge->addKey('id_jabatan', true);
        $this->forge->createTable('jabatan');

        // === TABEL ANGGOTA UKM ===
        $this->forge->addField([
            'id_anggota' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'id_user' => [
                'type' => 'INT',
                'unsigned' => true
            ],
            'id_ukm' => [
                'type' => 'INT',
                'unsigned' => true
            ],
            'id_jabatan' => [
                'type' => 'INT',
                'unsigned' => true,
                'null' => true
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true
            ]
        ]);
        $this->forge->addKey('id_anggota', true);
        $this->forge->createTable('anggota_ukm');

        // === TABEL PENDAFTARAN ANGGOTA UKM ===
        $this->forge->addField([
            'id_pendaftar' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'id_user' => [
                'type' => 'INT',
                'unsigned' => true
            ],
            'id_ukm' => [
                'type' => 'INT',
                'unsigned' => true
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['pending', 'diterima', 'ditolak'],
                'default' => 'pending'
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true
            ]
        ]);
        $this->forge->addKey('id_pendaftar', true);
        $this->forge->createTable('pendaftaran_anggota_ukm');

        // === RELASI FOREIGN KEY ===
        // Jabatan ➜ UKM
        $this->db->query('ALTER TABLE jabatan ADD CONSTRAINT fk_jabatan_ukm FOREIGN KEY (id_ukm) REFERENCES ukm(id_ukm) ON DELETE CASCADE ON UPDATE CASCADE;');

        // Anggota UKM ➜ User, UKM, Jabatan
        $this->db->query('ALTER TABLE anggota_ukm ADD CONSTRAINT fk_anggota_user FOREIGN KEY (id_user) REFERENCES user(id_user) ON DELETE CASCADE ON UPDATE CASCADE;');
        $this->db->query('ALTER TABLE anggota_ukm ADD CONSTRAINT fk_anggota_ukm FOREIGN KEY (id_ukm) REFERENCES ukm(id_ukm) ON DELETE CASCADE ON UPDATE CASCADE;');
        $this->db->query('ALTER TABLE anggota_ukm ADD CONSTRAINT fk_anggota_jabatan FOREIGN KEY (id_jabatan) REFERENCES jabatan(id_jabatan) ON DELETE SET NULL ON UPDATE CASCADE;');

        // Pendaftaran ➜ User, UKM
        $this->db->query('ALTER TABLE pendaftaran_anggota_ukm ADD CONSTRAINT fk_pendaftaran_user FOREIGN KEY (id_user) REFERENCES user(id_user) ON DELETE CASCADE ON UPDATE CASCADE;');
        $this->db->query('ALTER TABLE pendaftaran_anggota_ukm ADD CONSTRAINT fk_pendaftaran_ukm FOREIGN KEY (id_ukm) REFERENCES ukm(id_ukm) ON DELETE CASCADE ON UPDATE CASCADE;');
    }

    public function down()
    {
        // Urutan drop harus kebalikan
        $this->forge->dropTable('pendaftaran_anggota_ukm');
        $this->forge->dropTable('anggota_ukm');
        $this->forge->dropTable('jabatan');
        $this->forge->dropTable('ukm');
        $this->forge->dropTable('super_admin');
        $this->forge->dropTable('admin');
        $this->forge->dropTable('user');
    }
}
