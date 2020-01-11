<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
use BasicApp\Helpers\Url;

$title = t('admin.menu', 'Blocks');

$this->data['mainMenu']['site']['items']['blocks']['active'] = true;

$this->data['breadcrumbs'][] = ['label' => $title, 'url' => Url::createUrl('admin/block')];

$this->data['title'] = $title;