<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
$adminTheme = service('adminTheme');

$form = $adminTheme->createForm($model);

echo $form->open();

echo $form->inputGroup($data, 'block_uid');

echo $form->codeTextareaGroup($data, 'block_content');

echo $form->renderErrors();

echo $form->beginButtons();

$label = $data->getPrimaryKey() ? t('admin', 'Update') : t('admin', 'Insert');

echo $form->endButtons();

echo $form->submitButton($label);

echo $form->close();