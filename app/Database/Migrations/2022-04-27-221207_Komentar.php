<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Komentar extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'commId'          => [
                'type'           => 'INT',
                'constraint'     => '100',
                'auto_increment' => TRUE
            ],
            'postId'          => [
                'type'           => 'INT',
                'constraint'     => '100',
            ],
            'name'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
            'komen'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '400',
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP'

        ]);
        $this->forge->addPrimaryKey('commId', true);
        $this->forge->createTable('komentar');
    }


    //--------------------------------------------------------------------

    public function down()
    {
        $this->forge->dropTable('komentar');
    }
}
