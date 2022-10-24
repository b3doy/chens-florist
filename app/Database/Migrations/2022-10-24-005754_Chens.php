<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Chens extends Migration
{
    public function up()
    {
        $this->forge->createDatabase('chens', true);
    }

    public function down()
    {
        //
    }
}
