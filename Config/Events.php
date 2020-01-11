<?php

use BasicApp\System\SystemEvents;
use BasicApp\Admin\AdminEvents;
use BasicApp\Block\Controllers\Admin\Block as BlockController;
use BasicApp\Helpers\Url;

SystemEvents::onPreSystem(function()
{
    helper(['block']);
});

AdminEvents::onMainMenu(function($event)
{
    if (BlockController::checkAccess())
    {
        $event->items['site']['items']['blocks'] = [
            'url'   => Url::createUrl('admin/block'),
            'label' => t('admin.menu', 'Blocks')
        ];
    }
});