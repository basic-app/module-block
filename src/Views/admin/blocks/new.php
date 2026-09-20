<?php

helper(['form', 'render_view']);

$this->setVar('title', lang('Admin.Blocks'));
$this->setVar('breadcrumbs', [
    lang('Admin.Blocks') => site_url('admin/blocks'),
    lang('Admin.Add')
]);
$this->setVar('description', lang('Admin.Add Block'));
$this->setVar('activeMenu', 'blocks');

$this->setVar('actions', [
    [
        'label' => lang('Admin.Back'),
        'url' => site_url('admin/blocks')
    ]
]);
?>
<?php $this->extend('BasicApp\Admin\layout');?>
<?php $this->section('content');?>

<?= form_open_multipart('admin/blocks/create');?>

<?= render_view('BasicApp\Block\admin/blocks/form', [
    'data' => $data,
    'labels' => $labels,
    'errors' => $errors
]);?>

<?= view_cell('AdminValidationErrors', [
    'errors' => $errors
]);?>

<?= view_cell('AdminFormButton', [
    'label' => lang('Admin.Create'),
    'attributes' => [
        'type' => 'submit'
    ]
]);?>

<?= form_close();?>

<?php $this->endSection();?>