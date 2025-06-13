<?php

$cats = R::find('categories', 'ORDER BY title ASC');

if (isset($_POST['postSubmit'])) {

    if (trim($_POST['title']) == '') {
        $_SESSION['errors'][] = ['title' => 'Введите заголовок поста'];
    }

    if (trim($_POST['content']) == '') {
        $_SESSION['errors'][] = ['title' => 'Заполните содержимое поста'];
    }

    if (empty($_SESSION['errors'])) {
        $post = R::dispense('posts');
        $post->title = $_POST['title'];
        $post->cat = $_POST['cat'];
        $post->content = $_POST['content'];
        $post->timestamp = time();

        if (isset($_FILES['cover']['name']) && $_FILES['cover']['tmp_name'] !== '') {
            $coverFileName = saveUploadedImg('cover', [600, 300], 12, 'blog', [1110, 460], [290, 230]);

            $post->cover = $coverFileName[0];
            $post->coverSmall = $coverFileName[1];
        }

        R::store($post);
        $_SESSION['success'][] = ['title' => 'Пост успешно добавлен'];
        header('Location: ' . HOST . 'admin/blog');
        exit();
    }

}

ob_start();
include ROOT . 'admin/templates/blog/new.tpl';
$content = ob_get_contents();
ob_end_clean();

include ROOT . 'admin/templates/template.tpl';
