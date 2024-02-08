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
use CodeIgniter\Events\Events;

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

if (class_exists(AdminEvents::class))
{
    AdminEvents::onMainMenu(function($event)
    {
        $event->items['site']['items']['blocks'] = [
            'url'   => Url::createUrl('admin/block'),
            'label' => t('admin.menu', 'Blocks')
        ];
    });
}

if (class_exists(SiteEvents::class))
{
    SiteEvents::onMainLayout(function($event)
    {
        $event->params['copyright'] = $event->params['copyright'] ?? block('site.copyright', '&copy; My Company {year}.');
        
        $event->params['siteTitle'] = $event->params['siteTitle'] ?? block('site.title', 'Site Title');

        $event->params['siteName'] = $event->params['siteName'] ?? block('site.name', 'Site Name');

        $event->params['siteDescription'] = $event->params['siteDescription'] ?? block('site.description', 'Site description.');
    });
}

if (class_exists(SiteEvents::class))
{
    SiteEvents::onRegisterAssets(function($event)
    {
        $event->head .= block('site.head');
        
        $event->beginBody .= block('site.beginBody');
        
        $event->endBody .= block('site.endBody');
    });
}