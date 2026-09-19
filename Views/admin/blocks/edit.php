<?php

helper(['form', 'render_view']);

$this->setVar('title', lang('Admin.Blocks'));
$this->setVar('description', lang('Admin.Edit Block'));
$this->setVar('activeMenu', 'blocks');
$this->setVar('breadcrumbs', [
    lang('Admin.Blocks') => site_url('admin/blocks'),
    lang('Admin.Edit')
]);

$this->setVar('actions', [
    [
        'label' => lang('Admin.Back'),
        'url' => site_url('admin/blocks')
    ]
]);
?>
<?php $this->extend('BasicApp\Admin\layout');?>
<?php $this->section('content');?>

<?= form_open_multipart('admin/blocks/update/' . $data->block_id);?>

<?= render_view('\BasicApp\Block\admin/blocks/form', [
    'data' => $data,
    'labels' => $labels,
    'errors' => $errors
]);?>

<?= view_cell('AdminValidationErrors', [
    'errors' => $errors
]);?>

<?= view_cell('AdminFormButton', [
    'label' => lang('Admin.Update'),
    'attributes' => [
        'type' => 'submit'
    ]
]);?>

<?= form_close();?>

<?php $this->endSection();?>