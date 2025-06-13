<?php


if ( isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $message = R::load('messages', $_GET['id']);
    if (!empty($message['file_name_src'])) {
        $fileFolderLocation = ROOT . 'usercontent/contact-form/';
        unlink($fileFolderLocation . $message->file_name_src);
    }
    R::trash($message);
    $_SESSION['success'][] = ['title' => 'Сообщение было удалено'];

}

$messages = R::find('messages', 'ORDER BY id DESC');


ob_start();
include ROOT . 'admin/templates/messages/all.tpl';
$content = ob_get_contents();
ob_end_clean();


include ROOT . 'admin/templates/template.tpl';
