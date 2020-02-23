<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\Block;

use BasicApp\Block\Models\BlockModel;
use BasicApp\Block\Events\BlockEvent;

abstract class BaseBlockEvents extends \CodeIgniter\Events\Events
{

    const EVENT_BLOCK = 'ba:block';

    public static function onBlock($callback)
    {
        return static::on(static::EVENT_BLOCK, $callback);
    }

    public static function block(string $uid, string $default = '', array $params = [])
    {
        $event = new BlockEvent;

        $event->uid = $uid;

        $event->content = BlockModel::content($uid, true, ['block_content' => $default]);

        $event->params = $params;

        static::trigger(static::EVENT_BLOCK, $event);

        return strtr($event->content, $event->params);
    }

}