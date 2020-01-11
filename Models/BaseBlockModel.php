<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\Block\Models;

abstract class BaseBlockModel extends \BasicApp\Core\Model
{

    protected $table = 'blocks';

    protected $primaryKey = 'block_id';

    protected $fieldLabels = [
        'block_id' => 'ID',
        'block_uid' => 'UID',
        'block_content' => 'Content',
        'block_created_at' => 'Created',
        'block_updated_at' => 'Updated'
    ];

    protected $langCategory = 'blocks';

    protected $returnType = Block::class;

    protected $useTimestamps = true;

    protected $createdField = 'block_created_at';

    protected $updatedField = 'block_updated_at';

    public static function getBlock(string $uid, bool $create = true, array $params = [])
    {
        return static::getEntity(['block_uid' => $uid], $create, $params);
    }

    public static function content(string $uid, bool $create = true, array $params = []) : string
    {
        $model = static::getBlock($uid, $create, $params);

        if ($model)
        {
            return (string) $model->block_content;
        }

        if (array_key_exists('block_content', $params))
        {
            return $params['block_content'];
        }

        return '';
    }

    public static function findAllByPrefix($prefix)
    {
        $class = static::class;

        return (new $class)->like('block_uid', $prefix . '.', 'left')->findAll();
    }

}