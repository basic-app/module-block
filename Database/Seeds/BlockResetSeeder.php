<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\Block\Database\Seeds;

class BlockResetSeeder extends \BasicApp\Core\Seeder
{

    public function run()
    {
        $this->db->table('blocks')->truncate();
    }

}