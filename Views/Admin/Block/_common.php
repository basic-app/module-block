<?php

use BasicApp\Helpers\Url;

$title = t('admin.menu', 'Blocks');

$this->data['mainMenu']['blocks']['active'] = true;

$this->data['breadcrumbs'][] = ['label' => $title, 'url' => Url::createUrl('admin/block')];

$this->data['title'] = $title;
