<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Produk extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_produk' => [
                'type'              => 'INT',
                'unsigned'          => true,
                'auto_increment'    => true
            ],
            'nama_produk' => [
                'type'          => 'VARCHAR',
                'constraint'    => '255'
            ],
            'deskripsi_produk' => [
                'type'  => 'TEXT',
                'null'  => true
            ],
            'created_at' => [
                'type'  => 'DATETIME',
                'null'  => true
            ],
            'updated_at' => [
                'type'  => 'DATETIME',
                'null'  => true
            ]
        ]);
        $this->forge->addKey('id_produk', true);
        $this->forge->createTable('produk');
    }

    public function down()
    {
        //
    }
}
