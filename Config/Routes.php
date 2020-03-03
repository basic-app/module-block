<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
$routes->add('admin/block', '\BasicApp\Block\Controllers\Admin\Block::index');
$routes->add('{locale}/admin/block', '\BasicApp\Block\Controllers\Admin\Block::index');

$routes->add('admin/block/(:segment)', '\BasicApp\Block\Controllers\Admin\Block::$1');
$routes->add('{locale}/admin/block/(:segment)', '\BasicApp\Block\Controllers\Admin\Block::$1');