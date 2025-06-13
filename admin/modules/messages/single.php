<?php

$message = R::load('messages', $_GET['id']);
$message->status = NULL;
R::store($message);

$messagesNewCounter = R::count('messages', ' status = ?', ['new']);


ob_start();
include ROOT . 'admin/templates/messages/single.tpl';
$content = ob_get_contents();
ob_end_clean();


include ROOT . 'admin/templates/template.tpl';
