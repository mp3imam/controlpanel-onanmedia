<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateLaporanPLK extends Migration
{
    private $tableName = 'laporan_plk';
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'VARCHAR',
                'constraint' => 40,
            ],
            'market_id' => [
                'type' => 'VARCHAR',
                'constraint' => 40,
            ],
            'tgl_lelang' => [
                'type' => 'date',
            ],
            'penjual_no' => [
                'type' => 'INT',
                'null' => true
            ],
            'penjual_nama' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'pembeli_no' => [
                'type' => 'INT',
                'null' => true
            ],
            'pembeli_nama' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'komoditas' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'jenis' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'volume' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'satuan' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'mata_uang' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'harga_satuan' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'status_realisasi' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'keterangan' => [
                'type' => 'TEXT',
            ],
            'nilai_realisasi' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => true,
                'default' => 0
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
