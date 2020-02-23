<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
use BasicApp\Block\BlockEvents;

if (!function_exists('block'))
{
    function block(string $uid, string $default = '', array $params = [])
    {
        return BlockEvents::block($uid, $default, $params);
    }
}