<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
use BasicApp\Site\SiteEvents;
use BasicApp\System\SystemEvents;
use BasicApp\Admin\AdminEvents;
use BasicApp\Block\Controllers\Admin\Block as BlockController;
use BasicApp\Helpers\Url;
use BasicApp\System\Events\SystemResetEvent;
use BasicApp\Block\Database\Seeds\BlockResetSeeder;
use Config\Database;

if (class_exists(SystemEvents::class))
{
    SystemEvents::onPreSystem(function()
    {
        helper(['block']);
    });
}

if (class_exists(SystemEvents::class))
{
    SystemEvents::onReset(function(SystemResetEvent $event)
    {
        $seeder = Database::seeder();

        $seeder->call(BlockResetSeeder::class);
    });
}

if (class_exists(AdminEvents::class))
{
    AdminEvents::onMainMenu(function($event)
    {
        if (service('admin')->can(BlockController::class))
        {
            $event->items['site']['items']['blocks'] = [
                'url'   => Url::createUrl('admin/block'),
                'label' => t('admin.menu', 'Blocks')
            ];
        }
    });
}

if (class_exists(SiteEvents::class))
{
    SiteEvents::onMainLayout(function($event)
    {
        $event->params['title'] = $event->params['title'] ?? block('site.defaultTitle', 'My Site Title');

        $event->params['siteName'] = $event->params['siteName'] ?? block('site.siteName', 'My Site');
        
        $event->params['copyright'] = $event->params['copyright'] ?? block('site.copyright', '&copy; My Company {year}.');
        
        $event->params['description'] = $event->params['description'] ?? block('site.defaultDescription', 'Default site description.');
    });
}