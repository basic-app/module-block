<?php

$this->setVar('title', lang('Admin.Blocks'));
$this->setVar('activeMenu', 'blocks');
$this->setVar('description', lang('Admin.Manage Blocks'));
$this->setVar('breadcrumbs', [
    lang('Admin.Blocks') => site_url('admin/blocks'),
    lang('Admin.Manage')
]);
$this->setVar('actions', [
    [
        'scenario' => 'add',
        'url' => site_url('admin/blocks/new')
    ]
]);
?>
<?php $this->extend('BasicApp\Admin\layout');?>
<?php $this->section('content');?>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th class="text-end" width="1%"><?= $labels['block_id'] ?? 'block_id';?></th>
                <th><?= $labels['block_uid'] ?? 'block_uid';?></th>
                <th><?= $labels['block_name'] ?? 'block_name';?></th>
                <th><?= $labels['block_active'] ?? 'block_active';?></th>
                <th><?= $labels['block_sort'] ?? 'block_sort';?></th>
                <th width="1%"></th>
                <th width="1%"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($elements as $data):?>
                <tr>
                    <td class="text-end"><?= $data->block_id;?></td>
                    <td><?= $data->block_uid;?></td>
                    <td><?= $data->block_name;?></td>
                    <td><?= lang($data->block_active ? 'Admin.Yes' : 'Admin.No');?></td>
                    <td><?= $data->block_sort;?></td>
                    <td><?= view_cell('AdminGridButton', [
                            'scenario' => 'edit',
                            'url' => site_url('admin/blocks/edit/' . $data->block_id)
                        ]);?>
                    </td>
                    <td>
                        <?= view_cell('AdminGridButton', [
                            'scenario' => 'delete',
                            'url' => site_url('admin/blocks/delete/' . $data->block_id)
                        ]);?>    
                    </td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>
<?php if($pager->getPageCount('default') > 1):?>
    <?= $pager->links('default', 'admin');?>
<?php endif;?>
<?php $this->endSection();?>