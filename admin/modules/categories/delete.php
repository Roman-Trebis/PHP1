<?php

$cat = R::load('categories', $_GET['id']);

if (isset($_POST['submit'])) {
    R::trash($cat);
    $_SESSION['success'][] = ['title' => 'Категория была удалена'];
    header('Location:' . HOST . 'admin/category');
    exit();
}

ob_start();
include ROOT . 'admin/templates/categories/delete.tpl';
$content = ob_get_contents();
ob_end_clean();

include ROOT . 'admin/templates/template.tpl';
