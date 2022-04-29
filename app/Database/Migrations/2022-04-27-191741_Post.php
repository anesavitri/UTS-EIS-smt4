<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Post extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'postId'          => [
                'type'           => 'INT',
                'constraint'     => '100',
                'auto_increment' => TRUE
            ],
            'name'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
            'content'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '500',
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP'

        ]);
        $this->forge->addPrimaryKey('postId', true);
        $this->forge->createTable('postingan');
    }

    //--------------------------------------------------------------------

    public function down()
    {
        $this->forge->dropTable('postingan');
    }
}
