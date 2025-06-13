<?php

if (isset($_POST['submit'])) {

    if (trim($_POST['contacts_title']) == '') {
        $_SESSION['errors'][] = ['title' => 'Введите заголовок контактов'];
    }

    if (trim($_POST['contacts_text']) == '') {
        $_SESSION['errors'][] = ['title' => 'Заполните содержимое контактов'];
    }

    if (empty($_SESSION['errors'])) {

        function trimElement ($item){
            return trim($item);
        }

        $_POST = array_map('trimElement', $_POST);

        $res[] = R::exec('UPDATE settings SET value = ? WHERE name = ? ', [$_POST['about_title'], 'about_title']);
        $res[] = R::exec('UPDATE settings SET value = ? WHERE name = ? ', [$_POST['about_text'], 'about_text']);

        $res[] = R::exec('UPDATE settings SET value = ? WHERE name = ? ', [$_POST['services_title'], 'services_title']);
        $res[] = R::exec('UPDATE settings SET value = ? WHERE name = ? ', [$_POST['services_text'], 'services_text']);

        $res[] = R::exec('UPDATE settings SET value = ? WHERE name = ? ', [$_POST['contacts_title'], 'contacts_title']);
        $res[] = R::exec('UPDATE settings SET value = ? WHERE name = ? ', [$_POST['contacts_text'], 'contacts_text']);

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

$settingsContacts = R::find('settings', ' section LIKE ? ', ['contacts']);

$contacts = [];

foreach ($settingsContacts as $key => $value) {
    $contacts[$value['name']] = $value['value'];
}

ob_start();
include ROOT . 'admin/templates/contacts/edit.tpl';
$content = ob_get_contents();
ob_end_clean();

include ROOT . 'admin/templates/template.tpl';
