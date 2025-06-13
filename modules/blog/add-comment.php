<?php

if (isset($_SESSION['login']) && $_SESSION['login'] === 1) {

    if (isset($_POST['submit'])) {

        if (!isset($_POST['id']) || empty($_POST['id'])) {
            $_SESSION['errors'][] = ['title' => 'Отсутствует параметр id. Невозможно добавить комментарий'];
        }

        if (
            !isset($_POST['comment'])
            || empty($_POST['comment'])
            || mb_strlen(trim($_POST['comment'])) < 3
        ) {
            $_SESSION['errors'][] = ['title' => 'Комментарий не может быть пустым'];
        }

        if (empty($_SESSION['errors'])) {
            $comment = R::dispense('comments');
            $comment->text = $_POST['comment'];
            $comment->post = $_POST['id'];
            $comment->user = $_SESSION['logged_user']['id'];
            $comment->timestamp = time();
            R::store($comment);
            header("Location: " . HOST . "blog/" . $_POST['id'] . '#comments');
        } else {
            header("Location: " . HOST . "blog/" . $_POST['id'] . '#comments-form');
        }
    }
} else {
    header("Location: " . HOST);
}
