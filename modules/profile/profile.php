<?php

function getUserComments($userId){
    $sqlQuery = 'SELECT
                        comments.id, comments.text, comments.post, comments.user, comments.timestamp,
                        posts.title
                FROM `comments`
                LEFT JOIN `posts` ON comments.post = posts.id
                WHERE comments.user = ?';

    return R::getAll($sqlQuery, [$userId]);
}

$pageTitle = "Профиль пользователя";
$pageClass = "profile-page";

if (isset($uriGet)) {
    $user = R::load('users', $uriGet);
    $comments = getUserComments($uriGet);

} else {
    if (isset($_SESSION['login']) && $_SESSION['login'] === 1) {
        $user = R::load('users', $_SESSION['logged_user']['id']);
        $comments = getUserComments($_SESSION['logged_user']['id']);

    } else {
        $userNotLoggedIn = true;
    }
}

include ROOT . 'templates/_page-parts/_head.tpl';
include ROOT . 'templates/_parts/_header.tpl';

include ROOT . 'templates/profile/profile.tpl';

include ROOT . 'templates/_parts/_footer.tpl';
include ROOT . 'templates/_page-parts/_foot.tpl';
