<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddProdukTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'kategori_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],

            'nama_produk' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],

            'image' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'harga_beli' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'harga_jual' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'stok' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('kategori_id', 'kategori', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('produk');
    }

    public function down()
    {
        $this->forge->dropTable('produk');

    }
}
