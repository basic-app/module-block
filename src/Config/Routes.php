<?php

declare(strict_types=1);
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link https://basic-app.com
 */
use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

$routes->presenter('admin/blocks', [
    'websafe' => 1,
    'controller' => '\BasicApp\Block\Controllers\Admin\BlocksController'
]);
