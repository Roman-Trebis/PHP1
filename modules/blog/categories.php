<?php

$pageTitle = "Блог - все записи";

$category = R::load('categories', $uriGetParam);
$pageTitle = "Категория: {$category['cat_title']}";
$catTitle = "Категория: {$category['cat_title']}";

$pagination = pagination(6, 'posts', [' cat = ? ', [$uriGetParam]]);
$posts  = R::findLike('posts', ['cat' => [$uriGetParam]], 'ORDER BY id DESC ' . $pagination['sql_pages_limit']);

ob_start();
include ROOT . 'templates/blog/all-posts.tpl';
$content = ob_get_contents();
ob_end_clean();

include ROOT . 'templates/_page-parts/_head.tpl';
include ROOT . 'templates/_parts/_header.tpl';
include ROOT . 'templates/blog/index.tpl';
include ROOT . 'templates/_parts/_footer.tpl';
include ROOT . 'templates/_page-parts/_foot.tpl';
