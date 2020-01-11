<?php

$routes->add('admin/block', 'BasicApp\Block\Controllers\Admin\Block::index');
$routes->add('admin/block/(:segment)', 'BasicApp\Block\Controllers\Admin\Block::$1');