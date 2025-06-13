<?php

$pageTitle = "Главная страница";
$pageClass = "main-page";


$posts = R::find('posts', 'ORDER BY timestamp DESC LIMIT 0, 3');


include ROOT . 'templates/_page-parts/_head.tpl';
include ROOT . 'templates/_parts/_header.tpl';

include ROOT . 'templates/main/main.tpl';

include ROOT . 'templates/_parts/_footer.tpl';
include ROOT . 'templates/_page-parts/_foot.tpl';
