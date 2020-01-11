<?php

require __DIR__ . '/_common.php';

$this->data['breadcrumbs'][] = ['label' => t('admin', 'Create')];

$this->data['enableCard'] = true;

$this->data['cardTitle'] = $this->data['title'];

echo app_view($viewPath . '_form', [
    'model' => $model,
    'errors' => $errors
]);