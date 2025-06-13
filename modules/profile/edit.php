<?php

function updateUserandGoToProfile($user)
{
    if (isset($_POST['updateProfile'])) {
        $_SESSION['errors'] = [];

        if (trim($_POST['name']) === '') {
            $_SESSION['errors'][] = ['title' => 'Введите имя'];
        }
        if (trim($_POST['surname']) === '') {
            $_SESSION['errors'][] = ['title' => 'Введите фамилию'];
        }
        if (trim($_POST['email']) === '') {
            $_SESSION['errors'][] = ['title' => 'Введите Email'];
        }

        if (empty($_SESSION['errors'])) {
            $user->name = htmlentities($_POST['name']);
            $user->surname = htmlentities($_POST['surname']);
            $user->email = htmlentities($_POST['email']);
            $user->city = htmlentities($_POST['city']);
            $user->country = htmlentities($_POST['country']);

            if (isset($_FILES['avatar']['name']) && $_FILES['avatar']['tmp_name'] !== '') {
                $avatarFileName = saveUploadedImg('avatar', [160, 160], 12, 'avatars', [160, 160], [48, 48]);

                if ($avatarFileName) {
                    if (!empty($user->avatar) && file_exists(ROOT . 'usercontent/avatars/' . $user->avatar)) {
                        unlink(ROOT . 'usercontent/avatars/' . $user->avatar);
                    }
                    if (!empty($user->avatarSmall) && file_exists(ROOT . 'usercontent/avatars/' . $user->avatarSmall)) {
                        unlink(ROOT . 'usercontent/avatars/' . $user->avatarSmall);
                    }

                    $user->avatar = $avatarFileName[0];
                    $user->avatarSmall = $avatarFileName[1];
                }
            }

            if (isset($_POST['delete-avatar']) && $_POST['delete-avatar'] == 'on') {
                $avatarFolderLocation = ROOT . 'usercontent/avatars/';
                if (!empty($user->avatar) && file_exists($avatarFolderLocation . $user->avatar)) {
                    unlink($avatarFolderLocation . $user->avatar);
                }
                if (!empty($user->avatarSmall) && file_exists($avatarFolderLocation . $user->avatarSmall)) {
                    unlink($avatarFolderLocation . $user->avatarSmall);
                }

                $user->avatar = '';
                $user->avatarSmall = '';
            }

            R::store($user);
            $_SESSION['logged_user'] = $user;

            if (!headers_sent()) {
                header('Location: ' . HOST . 'profile');
                exit();
            } else {
                echo '<script>window.location.href="' . HOST . 'profile";</script>';
                exit();
            }
        }
    }
}

if (isset($_SESSION['login']) && $_SESSION['login'] === 1) {
    if ($_SESSION['logged_user']['role'] === 'user') {
        $user = R::load('users', $_SESSION['logged_user']['id']);
        updateUserandGoToProfile($user);
    } elseif ($_SESSION['logged_user']['role'] === 'admin') {
        if (isset($uriGet)) {
            $user = R::load('users', intval($uriGet));
            updateUserandGoToProfile($user);
        } else {
            $user = R::load('users', $_SESSION['logged_user']['id']);
            updateUserandGoToProfile($user);
        }
    }
} else {
    if (!headers_sent()) {
        header('Location: ' . HOST . 'login');
        exit();
    } else {
        echo '<script>window.location.href="' . HOST . 'login";</script>';
        exit();
    }
}

$pageTitle = "Профиль пользователя";

// ob_start();
// include ROOT . 'templates/about/about.tpl';
// $content = ob_get_contents();
// ob_end_clean();

include ROOT . 'templates/_page-parts/_head.tpl';
include ROOT . 'templates/_parts/_header.tpl';
include ROOT . 'templates/profile/profile-edit.tpl';
include ROOT . 'templates/_parts/_footer.tpl';
include ROOT . 'templates/_page-parts/_foot.tpl';
