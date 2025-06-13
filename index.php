<?php

require_once "config.php";
require_once "db.php";
require_once ROOT . "libs/resize-and-crop.php";
require_once ROOT . "libs/functions.php";

$_SESSION['errors'] = array();
$_SESSION['success'] = array();

session_start();

require(ROOT . "modules/settings/settings.php");
require(ROOT . "modules/admin-panel/admin-panel.php");

$uriModule = getModuleName();
$uriGet = getUriGet();
$uriGetParam = getUriGetParam();

switch ($uriModule) {
    case '':
        require(ROOT . "modules/main/index.php");
        break;

    case 'login':
        require ROOT . "modules/login/login.php";
        break;

    case 'registration':
        require ROOT . "modules/login/registration.php";
        break;

    case 'logout':
        require ROOT . "modules/login/logout.php";
        break;

    case 'lost-password':
        require ROOT . "modules/login/lost-password.php";
        break;

    case 'set-new-password':
        require ROOT . "modules/login/set-new-password.php";
        break;

    case 'profile':
        require ROOT . "modules/profile/profile.php";
        break;

    case 'profile-edit':
        require ROOT . "modules/profile/edit.php";
        break;

    case 'about':
        require ROOT . "modules/about/index.php";
        break;

    case 'blog':
        // require ROOT . "modules/blog/index.php";

        if (isset($uriGet) && $uriGet === 'cat' && !empty($uriGetParam)) {
            require ROOT . "modules/blog/categories.php";
        } elseif (isset($uriGet)) {
            require ROOT . "modules/blog/single-post.php";
        } else {
            require ROOT . "modules/blog/all.php";
        }
        break;

    case 'add-comment':
        require ROOT . "modules/blog/add-comment.php";
        break;

    case 'contacts':
        require ROOT . "modules/contacts/index.php";
        break;

    default:
        require ROOT . "modules/main/index.php";
        break;
}
