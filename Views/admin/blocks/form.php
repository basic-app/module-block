<?= view_cell('AdminInput', [
    'label' => $labels['block_name'] ?? 'block_name',
    'error' => $errors['block_name'] ?? null,
    'attributes' => [
        'name' => 'block_name',
        'value' => set_value('block_name', $data->block_name)
    ]
]);?>

<?= view_cell('AdminInput', [
    'label' => $labels['block_uid'] ?? 'block_uid',
    'error' => $errors['block_uid'] ?? null,
    'attributes' => [
        'name' => 'block_uid',
        'value' => set_value('block_uid', $data->block_uid)
    ]
]);?>

<?= view_cell('AdminInputEditor', [
    'label' => $labels['block_content_html'] ?? 'block_content_html',
    'error' => $errors['block_content_html'] ?? null,
    'attributes' => [
        'name' => 'block_content_html',
        'rows' => 10
    ],
    'slot' => set_value('block_content_html', $data->block_content_html)
]);?>

<?= view_cell('AdminInput', [
    'label' => $labels['block_sort'] ?? 'block_sort',
    'error' => $errors['block_sort'] ?? null,
    'attributes' => [
        'name' => 'block_sort',
        'value' => set_value('block_sort', $data->block_sort)
    ]
]);?>

<?= view_cell('AdminInputCheckbox', [
    'label' => $labels['block_active'] ?? 'block_active',
    'error' => $errors['block_active'] ?? null,
    'attributes' => [
        'name' => 'block_active',
        'value' => 1,
        'checked' => set_value('block_active', $data->block_active) == 1
    ],
    'uncheckValue' => 0
]);?>