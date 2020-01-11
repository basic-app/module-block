<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\Block\Controllers\Admin;

use BasicApp\Block\Models\Admin\BlockModel;

abstract class BaseBlock extends \BasicApp\Admin\AdminCrudController
{

    protected $modelClass = BlockModel::class;

    protected $viewPath = 'BasicApp\Block\Views\Admin\Block';

    protected $returnUrl = 'admin/block';

}