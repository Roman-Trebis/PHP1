<?php

if (isset($_POST['submit'])) {

    if (trim($_POST['site_title']) == '') {
        $_SESSION['errors'][] = ['title' => 'Введите название сайта'];
    }

    if (trim($_POST['copyright_name']) == '') {
        $_SESSION['errors'][] = ['title' => 'Заполните поле "Копирайт первая строка"'];
    }

    if (empty($_SESSION['errors'])) {

        function trimElement ($item){
            return trim($item);
        }

        $_POST = array_map('trimElement', $_POST);

        $res[] = R::exec('UPDATE settings SET value = ? WHERE name = ? ', [$_POST['site_title'], 'site_title']);
        $res[] = R::exec('UPDATE settings SET value = ? WHERE name = ? ', [$_POST['site_slogan'], 'site_slogan']);

        $res[] = R::exec('UPDATE settings SET value = ? WHERE name = ? ', [$_POST['copyright_name'], 'copyright_name']);
        $res[] = R::exec('UPDATE settings SET value = ? WHERE name = ? ', [$_POST['copyright_year'], 'copyright_year']);

        $_POST['status_on'] = isset($_POST['status_on']) ? $_POST['status_on'] : NULL;
        $res[] =  R::exec('UPDATE settings SET value = ? WHERE name = ? ', [$_POST['status_on'], 'status_on']);
        $res[] = R::exec('UPDATE settings SET value = ? WHERE name = ? ', [$_POST['status_label'], 'status_label']);
        $res[] = R::exec('UPDATE settings SET value = ? WHERE name = ? ', [$_POST['status_text'], 'status_text']);
        $res[] = R::exec('UPDATE settings SET value = ? WHERE name = ? ', [$_POST['status_link'], 'status_link']);

        $res[] = R::exec('UPDATE settings SET value = ? WHERE name = ? ', [$_POST['youtube'], 'youtube']);
        $res[] = R::exec('UPDATE settings SET value = ? WHERE name = ? ', [$_POST['instagram'], 'instagram']);
        $res[] = R::exec('UPDATE settings SET value = ? WHERE name = ? ', [$_POST['facebook'], 'facebook']);
        $res[] = R::exec('UPDATE settings SET value = ? WHERE name = ? ', [$_POST['vkontakte'], 'vkontakte']);
        $res[] = R::exec('UPDATE settings SET value = ? WHERE name = ? ', [$_POST['linkedin'], 'linkedin']);
        $res[] = R::exec('UPDATE settings SET value = ? WHERE name = ? ', [$_POST['github'], 'github']);

        $fail = false;
        foreach ($res as $value) {
            if (is_array($value) && empty($value)) {
                $fail = true;
            }
        }

        if ($fail) {
            $_SESSION['errors'][] = [
                'title' => 'Данные не сохранились',
                'desc' => 'Если ошибка повторяется, обратитесь к администратору сайта.'
            ];
        } else {
            $_SESSION['success'][] = ['title' => 'Контакты успешно обновлены'];
        }
    }
}

$settingsArray = R::find('settings', ' section LIKE ? ', ['settings']);

$settings = [];

foreach ($settingsArray as $key => $value) {
    $settings[$value['name']] = $value['value'];
}

ob_start();
include ROOT . 'admin/templates/settings/settings.tpl';
$content = ob_get_contents();
ob_end_clean();

include ROOT . 'admin/templates/template.tpl';
