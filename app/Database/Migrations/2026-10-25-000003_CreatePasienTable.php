<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePasienTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'pasien_id'     => ['type' => 'VARCHAR', 'constraint' => 12],
            'nama_pasien'   => ['type' => 'VARCHAR', 'constraint' => 120],
            'tanggal_lahir' => ['type' => 'DATE'],
            'jenis_kelamin' => ['type' => 'VARCHAR', 'constraint' => 15],
            'alamat'        => ['type' => 'VARCHAR', 'constraint' => 255],
            'created_at'    => ['type' => 'DATETIME', 'null' => true],
            'updated_at'    => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('pasien_id', true);
        $this->forge->addKey('nama_pasien');
        $this->forge->createTable('pasien', true, ['ENGINE' => 'InnoDB', 'CHARSET' => 'utf8mb4', 'COLLATE' => 'utf8mb4_unicode_ci']);
    }

    public function down()
    {
        $this->forge->dropTable('pasien', true);
    }
}
