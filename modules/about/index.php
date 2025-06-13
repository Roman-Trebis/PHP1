<?php

// $content = "Main page";

$page_name = "О сайте";
$page_text = "Текст страницы О сайте";

ob_start();
include ROOT . 'templates/about/about.tpl';
$content = ob_get_contents();
ob_end_clean();

include ROOT . 'templates/_parts/_header.tpl';
include ROOT . 'templates/template.tpl';
include ROOT . 'templates/_parts/_footer.tpl';
