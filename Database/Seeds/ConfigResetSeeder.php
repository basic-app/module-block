<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\Block\Database\Seeds;

class ConfigResetSeeder extends \BasicApp\Core\Seeder
{

    public function run()
    {
        $this->db->table('posts')->truncate();
    }

}