<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link https://basic-app.com
 */
use BasicApp\Block\Entities\Block;
use BasicApp\Block\Models\Blocks;

if (!function_exists('block'))
{
    function block(string $uid, bool $create = false, array $defaults = []) : ?Block
    {
        return model(Blocks::class)->getBlock($uid, $create, $defaults);
    }
}