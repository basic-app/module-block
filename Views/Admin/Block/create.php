<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
require __DIR__ . '/_common.php';

$this->tempData['breadcrumbs'][] = ['label' => t('admin', 'Create')];

$this->tempData['enableCard'] = true;

$this->tempData['cardTitle'] = $this->tempData['title'];

$this->extend('BasicApp\Admin/layouts/app');

$this->section('content');

echo app_view($viewPath . '_form', [
    'model' => $model,
    'errors' => $errors
]);

$this->endSection();