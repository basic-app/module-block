<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\Block\Models\Admin;

abstract class BaseBlockModel extends \BasicApp\Block\Models\BlockModel
{

    protected $returnType = Block::class;

    protected $allowedFields = [
        'block_uid',
        'block_content'
    ];

    protected $validationRules = [
        'block_uid' => 'not_special_chars|max_length[255]|is_unique[blocks.block_uid,block_id,{block_id}]|required',
        'block_content' => 'max_length[65535]'
    ];

}