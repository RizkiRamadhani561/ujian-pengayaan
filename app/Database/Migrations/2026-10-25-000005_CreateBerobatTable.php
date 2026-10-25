<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBerobatTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'no_transaksi'    => ['type' => 'VARCHAR', 'constraint' => 20],
            'pasien_id'       => ['type' => 'VARCHAR', 'constraint' => 12],
            'tanggal_berobat' => ['type' => 'DATE'],
            'dokter_id'       => ['type' => 'VARCHAR', 'constraint' => 12],
            'keluhan'         => ['type' => 'TEXT'],
            'biaya_adm'       => ['type' => 'DECIMAL', 'constraint' => '12,2', 'default' => 0],
            'created_at'      => ['type' => 'DATETIME', 'null' => true],
            'updated_at'      => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('no_transaksi', true);
        $this->forge->addKey('pasien_id');
        $this->forge->addKey('dokter_id');
        $this->forge->addKey('tanggal_berobat');
        $this->forge->addForeignKey('pasien_id', 'pasien', 'pasien_id', 'CASCADE', 'RESTRICT');
        $this->forge->addForeignKey('dokter_id', 'dokter', 'dokter_id', 'CASCADE', 'RESTRICT');
        $this->forge->createTable('berobat', true, ['ENGINE' => 'InnoDB', 'CHARSET' => 'utf8mb4', 'COLLATE' => 'utf8mb4_unicode_ci']);
    }

    public function down()
    {
        $this->forge->dropTable('berobat', true);
    }
}
