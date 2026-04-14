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
use BasicApp\System\Events\SystemResetEvent;
use BasicApp\Block\Database\Seeds\BlockResetSeeder;
use Config\Database;
use CodeIgniter\Events\Events;
use BasicApp\AdminMenu\AdminMenuEvents;

Events::on('pre_system', function()
{
    helper(['block']);
});

if (class_exists(SystemEvents::class))
{
    SystemEvents::onReset(function(SystemResetEvent $event)
    {
        $seeder = Database::seeder();

        $seeder->call(BlockResetSeeder::class);
    });
}

if (class_exists(AdminMenuEvents::class))
{
    AdminMenuEvents::onMainMenu(function($event)
    {
        $event->items['site']['items']['blocks'] = [
            'url'   => Url::createUrl('admin/block'),
            'label' => t('admin.menu', 'Blocks')
        ];
    });
}