<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Password2Migration extends Migration
{
    private $table = 'Siswas_Users';
    public function up()
    {
        $field = [
            'Password2' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
                'NULL' => true
            ]
        ];
        $this->forge->addColumn($this->table, $field);
        $this->db->table($this->table)->update(['Password2' => '$2y$10$8w69cz/Y//YxAc8lIV2pA.HOz1JEGxZ2gycQo00CRWcdut5pt222S']);
    }

    public function down()
    {
        $this->forge->dropColumn($this->table, 'Password2');
    }
}
