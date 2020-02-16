<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
use BasicApp\Block\Models\BlockModel;
use BasicApp\Helpers\Url;

require __DIR__ . '/_common.php';

unset($this->data['breadcrumbs'][count($this->data['breadcrumbs']) - 1]['url']);

$this->data['actionMenu'][] = [
    'url' => Url::returnUrl('admin/block/create'), 
    'label' => t('admin', 'Create'), 
    'icon' => 'fa fa-plus',
    'linkAttributes' => [
        'class' => 'btn btn-success'
    ]   
];

$adminTheme = service('adminTheme');

echo $adminTheme->grid([
    'headers' => [
        [
            'class' => $adminTheme::GRID_HEADER_PRIMARY_KEY,
            'content' => $model->getFieldLabel('block_id')
        ],
        $model->getFieldLabel('block_created_at'),
        [
            'class' => $adminTheme::GRID_HEADER_LABEL,
            'content' => $model->getFieldLabel('block_uid')
        ],
        ['class' => $adminTheme::GRID_HEADER_BUTTON_UPDATE],
        ['class' => $adminTheme::GRID_HEADER_BUTTON_DELETE]
    ],
    'items' => function() use ($elements, $adminTheme) {

        foreach($elements as $data)
        {
            yield [
                $data->block_id,
                $data->block_created_at,
                $data->block_uid,
                ['url' => Url::returnUrl('admin/block/update', ['id' => $data->block_id])],
                ['url' => Url::returnUrl('admin/block/delete', ['id' => $data->block_id])]
            ];
        }
    }
]);

if ($pager)
{
    echo $pager->links('default', 'adminTheme');
}