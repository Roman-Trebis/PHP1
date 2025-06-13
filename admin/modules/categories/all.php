<?php

$cats = R::find('categories', 'ORDER BY id DESC');

ob_start();
include ROOT . 'admin/templates/categories/all.tpl';
$content = ob_get_contents();
ob_end_clean();

include ROOT . 'admin/templates/template.tpl';
