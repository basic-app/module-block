<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link https://basic-app.com
 */
namespace BasicApp\Block\Entities;

use BasicApp\Core\Entity;

class Block extends Entity
{
    protected $datamap = [];
    protected $dates = ['block_created_at', 'block_updated_at', 'block_deleted_at'];
    protected $casts = [];
}
