<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDokterTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'dokter_id'   => ['type' => 'VARCHAR', 'constraint' => 12],
            'nama_dokter' => ['type' => 'VARCHAR', 'constraint' => 120],
            'poli_id'     => ['type' => 'VARCHAR', 'constraint' => 12],
            'created_at'  => ['type' => 'DATETIME', 'null' => true],
            'updated_at'  => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('dokter_id', true);
        $this->forge->addKey('poli_id');
        $this->forge->addForeignKey('poli_id', 'poli', 'poli_id', 'CASCADE', 'RESTRICT');
        $this->forge->createTable('dokter', true, ['ENGINE' => 'InnoDB', 'CHARSET' => 'utf8mb4', 'COLLATE' => 'utf8mb4_unicode_ci']);
    }

    public function down()
    {
        $this->forge->dropTable('dokter', true);
    }
}
