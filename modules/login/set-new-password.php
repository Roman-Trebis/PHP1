<?php

$pageTitle = "Установить новый пароль";
$pageClass = "authorization-page";

if (!empty($_GET['email']) && !empty($_GET['code'])) {
    $user = R::findOne('users', 'email = ?', array($_GET['email']));
    if (!$user) {
        header("Location: " . HOST . "lost-password");
    }
} 
else if (!empty($_POST['set-new-password'])) {
    $user = R::findOne('users', 'email = ?', array($_POST['email']));
    if ($user) {
        if ($user->recovery_code === $_POST['resetCode'] && $user->recovery_code != '' && $user->recovery_code != NULL ) {
            $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $user->recovery_code = '';
            R::store($user);
            $success[] = ['title' => 'Пароль успешно обновлен'];
            $newPasswordReady = true;
        } else {
            $_SESSION['errors'][] = ['title' => 'Неверный код'];
        }
    }
} 
else {
    header("Location: " . HOST . "lost-password");
    die();
}

ob_start();
include ROOT . 'templates/login/set-new-password.tpl';
$content = ob_get_contents();
ob_end_clean();

include ROOT . 'templates/_page-parts/_head.tpl';
include ROOT . 'templates/login/login-page.tpl';
include ROOT . 'templates/_page-parts/_foot.tpl';
