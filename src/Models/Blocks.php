<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link https://basic-app.com
 */
namespace BasicApp\Block\Models;

use App\Models\BaseModel;
use BasicApp\Block\Entities\Block;

class Blocks extends BaseModel
{
    protected $returnType = Block::class;
    
    protected $table = 'blocks';
    
    protected $primaryKey = 'block_id';

    protected $useTimestamps = true;

    protected $createdField  = 'block_created_at';
    
    protected $updatedField  = 'block_updated_at';
    
    protected $deletedField  = 'block_deleted_at';

    protected $allowedFields = [
        'block_name',
        'block_uid',
        'block_content_html',
        'block_sort',
        'block_active'
    ];
    
    protected $validationRules = [
        'block_uid' => [
            'label' => 'Admin.Block UID',
            'rules' => ['max_length[255]', 'required']
        ],
        'block_name' => [
            'label' => 'Admin.Block Name',
            'rules' => ['max_length[255]', 'required']
        ],
        'block_sort' => [
            'label' => 'Admin.Block Sort',
            'rules' => ['max_length[255]', 'permit_empty']
        ],
        'block_content_html' => [
            'label' => 'Admin.Block Content (HTML)',
            'rules' => ['max_length[65535]', 'permit_empty']
        ],
        'block_active' => [
            'label' => 'Admin.Block Active',
            'rules' => ['in_list[0,1]']
        ]
    ];

    public function getBlock(string $uid, bool $create = false, array $defaults = []) : ?Block
    {
        $block = $this->where('block_uid', $uid)->first();

        if (!$block)
        {
            if (!$create)
            {
                return null;
            }

            $block = new Block($defaults);

            $block->block_uid = $uid;

            $this->save($block);
        }

        return $block;
    }

    public function labels() : array
    {
        return array_merge(
            parent::labels(),
            [
                'block_id' => lang('Admin.Block ID')
            ]
        );
    }

    public function rowValidationRules($row) : array
    {
        $rules = $this->validationRules;

        if ($block_id = $this->getIdValue($row))
        {
            $rules['block_uid']['rules'][] = 'is_unique[blocks.block_uid,block_id,' . $block_id . ']';
        }
        else
        {
            $rules['block_uid']['rules'][] = 'is_unique[blocks.block_uid]';
        }
    
        return $rules;
    }
}
