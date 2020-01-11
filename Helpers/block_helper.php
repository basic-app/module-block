<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
use BasicApp\Block\Models\BlockModel;

if (!function_exists('block'))
{
    function block(string $uid, string $default = '', array $params = [])
    {
        $return = BlockModel::content($uid, true, ['block_content' => $default]);

        $return = strtr($return, $params);

        return $return;
    }
}