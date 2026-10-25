<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePoliTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'poli_id'    => ['type' => 'VARCHAR', 'constraint' => 12],
            'nama_poli'  => ['type' => 'VARCHAR', 'constraint' => 100],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('poli_id', true);
        $this->forge->addUniqueKey('nama_poli');
        $this->forge->createTable('poli', true, ['ENGINE' => 'InnoDB', 'CHARSET' => 'utf8mb4', 'COLLATE' => 'utf8mb4_unicode_ci']);
    }

    public function down()
    {
        $this->forge->dropTable('poli', true);
    }
}
