<?php

$pageTitle = "Регистрация";
$pageClass = "authorization-page";

if (isset($_POST['register'])) {

    $userEmail = isset($_POST['email']) ? trim($_POST['email']) : '';
    $userPass = isset($_POST['password']) ? trim($_POST['password']) : '';

    if ($userEmail == '') {
        $_SESSION['errors'][] = ['title' => 'Введите Email', 'desc' => '<p>Email обязателен для регистрации на сайте</p>'];
    } else if (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['errors'][] = ['title' => 'Введите корректный Email'];
    }

    if ($userPass == '' || (strlen($userPass) < 4)) {
        $_SESSION['errors'][] = ['title' => "Введите пароль длиной не менее 4 символов"];
    }

    if (R::count('users', 'email = ?', array($_POST['email'])) > 0) {
        $_SESSION['errors'][] = [
            'title' => 'Пользователь с таким Email уже зарегистрирован',
            'desc' => '<p>Используйте другой Email адрес, или воспользуйтесь <a href="'.HOST.'lost-password">восстановлением пароля</a>.</p>'
        ];
    }

    if (empty($_SESSION['errors'])) {
        $user = R::dispense('users');
        $user->email = $_POST['email'];
        $user->role = 'user';
        $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $result = R::store($user);

        if (is_int($result)) {
            $success[] = ['title' => 'Вы успешно зарегистрированы!'];

            $_SESSION['logged_user'] = $user;
            $_SESSION['login'] = 1;
            $_SESSION['role'] = $user->role;

            $_SESSION['success'][] = [
                'title' => 'Регистрация завершена',
                'desc' => '<p>Заполните свой профиль для дальнейшего пользования сайтом.</p>'
            ];

            header('Location: ' . HOST . "profile-edit");
            exit();
        } else {
            $_SESSION['errors'][] = ['title' => 'Что-то полшло не так. Повторите действие заново.'];
        }
    }

}

ob_start();
include ROOT . 'templates/login/form-registration.tpl';
$content = ob_get_contents();
ob_end_clean();

include ROOT . 'templates/_page-parts/_head.tpl';
include ROOT . 'templates/login/login-page.tpl';
include ROOT . 'templates/_page-parts/_foot.tpl';
