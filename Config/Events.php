<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
use BasicApp\System\SystemEvents;
use BasicApp\Admin\AdminEvents;
use BasicApp\Block\Controllers\Admin\Block as BlockController;
use BasicApp\Helpers\Url;
use BasicApp\System\Events\SystemSeedEvent;
use BasicApp\System\Events\SystemResetEvent;
use BasicApp\Block\Database\Seeds\ConfigSeeder;
use BasicApp\Block\Database\Seeds\ConfigResetSeeder;

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

SystemEvents::onSeed(function(SystemSeedEvent $event)
{
    $seeder = Database::seeder();

    $seeder->call(ConfigSeeder::class);
});

SystemEvents::onReset(function(SystemResetEvent $event)
{
    $seeder = Database::seeder();

    $seeder->call(ConfigResetSeeder::class);
});