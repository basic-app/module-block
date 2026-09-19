<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\Block\Database\Migrations;

class CreateBlocksTable extends \BasicApp\Core\Migration
{
    public $tableName = 'blocks';

    public function up()
    {
        $this->forge->addField([
            'block_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'block_created_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'block_updated_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'block_deleted_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'block_uid' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'block_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'block_sort' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true
            ],           
            'block_content_html' => [
                'type' => 'TEXT',
                'constraint' => 65535
            ],
            'block_active' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'unsigned' => true,
                'default' => 1
            ],
        ]);

        $this->forge->addKey('block_id', true);
        $this->forge->addKey('block_uid', false, true);
        $this->forge->addKey('block_active', false, false);
        $this->forge->createTable('blocks');
    }

    public function down()
    {
        $this->forge->dropTable('blocks');
    }
}