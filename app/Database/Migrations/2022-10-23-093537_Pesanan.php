<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pesanan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'              => 'INT',
                'unsigned'          => true,
                'auto_increment'    => true
            ],
            'tanggal' => [
                'type'  => 'DATETIME',
            ],
            'nama_konsumen' => [
                'type'          => 'VARCHAR',
                'constraint'    => '155'
            ],
            'tujuan' => [
                'type'  => 'TEXT',
                'null'  => true
            ],
            'ucapan' => [
                'type'  => 'TEXT',
                'null'  => true
            ],
            'jumlah' => [
                'type'          => 'INT',
                'constraint'    => 11
            ],
            'harga' => [
                'type'          => 'INT',
                'constraint'    => 11
            ],
            'total_harga' => [
                'type'          => 'INT',
                'constraint'    => 11
            ],
            'jenis_pembayaran' => [
                'type'          => 'VARCHAR',
                'constraint'    => '55',
                'null'          => true
            ],
            'rekening' => [
                'type'          => 'VARCHAR',
                'constraint'    => '255',
                'null'          => true
            ],
            'produk_id' => [
                'type'          => 'INT',
                'constaraint'   => 5
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
        $this->forge->addKey('id', true);
        $this->forge->createTable('pesanan');
    }

    public function down()
    {
        //
    }
}
