<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link https://basic-app.com
 */
namespace BasicApp\Block\Config;

use BasicApp\Admin\Events\AdminMenu;

AdminMenu::on(static function(AdminMenu $event) : void {
    $event->prependGroup('Data');
    $event->items['Data']['pages'] = [
        'label' => lang('Admin.Blocks'),
        'url' => site_url('admin/blocks'),
        'icon' => 'fa-cube'
    ];
});
