<?php

$pageTitle = "Блог - все записи";

// $post = R::load('posts', $uriGet);

$sqlQuery = 'SELECT
                    posts.id, posts.title, posts.content,
                    posts.cover, posts.timestamp, posts.edit_time, posts.cat,
                    categories.title AS cat_title
                FROM `posts`
                LEFT JOIN `categories` ON posts.cat = categories.id
                WHERE posts.id = ? LIMIT 1';

$post = R::getRow($sqlQuery, [$uriGet]);

$postsId = R::getCol('SELECT id FROM posts');
foreach ($postsId as $index => $value) {
    if ($post['id'] == $value) {
        $nextId = array_key_exists($index + 1, $postsId) ? $postsId[$index + 1] : null;
        $prevId = array_key_exists($index - 1, $postsId) ? $postsId[$index - 1] : null;
    }
}

$sqlQueryComments = 'SELECT comments.text, comments.user, comments.timestamp,
                            users.name, users.surname, users.avatar_small
                        FROM `comments` LEFT JOIN `users` ON comments.user = users.id
                        WHERE comments.post = ?';
$comments = R::getAll($sqlQueryComments, [$post['id']]);

$relatedPosts = get_related_posts($post['title']);

ob_start();
include ROOT . 'templates/blog/single-post.tpl';
$content = ob_get_contents();
ob_end_clean();

include ROOT . 'templates/_page-parts/_head.tpl';
include ROOT . 'templates/_parts/_header.tpl';
include ROOT . 'templates/blog/index.tpl';
include ROOT . 'templates/_parts/_footer.tpl';
include ROOT . 'templates/_page-parts/_foot.tpl';
