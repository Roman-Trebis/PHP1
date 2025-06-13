<?php

require_once "./../config.php";
require_once "./../db.php";
require_once ROOT . "libs/resize-and-crop.php";
require_once ROOT . "libs/functions.php";

$_SESSION['errors'] = array();
$_SESSION['success'] = array();
session_start();

if ( !(isset($_SESSION['role']) && $_SESSION['role'] === 'admin') ) {
    header('Location: ' . HOST . 'login');
    exit();
}

require(ROOT . "admin/modules/sidebar/sidebar.php");

$uriModule = getModuleNameForAdmin();

switch ($uriModule) {
    case '':
        require(ROOT . "admin/modules/admin/index.php");
        break;

    case 'blog':
        require ROOT . "admin/modules/blog/all.php";
        break;

    case 'post-new':
        require ROOT . "admin/modules/blog/new.php";
        break;

    case 'post-edit':
        require ROOT . "admin/modules/blog/edit.php";
        break;

    case 'post-delete':
        require ROOT . "admin/modules/blog/delete.php";
        break;

    case 'category':
        require ROOT . "admin/modules/categories/all.php";
        break;

    case 'category-new':
        require ROOT . "admin/modules/categories/new.php";
        break;

    case 'category-edit':
        require ROOT . "admin/modules/categories/edit.php";
        break;

    case 'category-delete':
        require ROOT . "admin/modules/categories/delete.php";
        break;

    case 'contacts':
        require ROOT . "admin/modules/contacts/edit.php";
        break;

    case 'messages':
        require ROOT . "admin/modules/messages/all.php";
        break;

    case 'message':
        require ROOT . "admin/modules/messages/single.php";
        break;

    case 'settings':
        require ROOT . "admin/modules/settings/settings.php";
        break;

    default:
        require ROOT . "admin/modules/admin/index.php";
        break;
}
