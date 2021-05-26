<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\Block\Database\Migrations;

class Migration_create_blocks_table extends \BasicApp\Migration\BaseMigration
{

    public $tableName = 'blocks';

    public function up()
    {
        $this->forge->addField([
            'block_id' => $this->primaryKey()->toArray(),
            'block_created_at' => $this->created()->toArray(),
            'block_updated_at' => $this->updated()->toArray(),
            'block_uid' => $this->string()->unique()->toArray(),
            'block_content' => $this->text()->toArray()
        ]);

        $this->forge->addKey('block_id', true);

        $this->forge->createTable($this->tableName);
    }

    public function down()
    {
        $this->forge->dropTable($this->tableName);
    }

}