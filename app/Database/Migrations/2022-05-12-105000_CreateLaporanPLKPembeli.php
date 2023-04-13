<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateLaporanPLKPembeli extends Migration
{
    private $tableName = 'laporan_plk_pembeli';
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'auto_increment' => true,
            ],
            'market_id' => [
                'type' => 'VARCHAR',
                'constraint' => 40,
            ],
            'tgl_lelang' => [
                'type' => 'date',
            ],
            'pembeli_nama' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'pembeli_no' => [
                'type' => 'INT',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable($this->tableName);
    }

    public function down()
    {
        $this->forge->dropTable($this->tableName);
    }
}
