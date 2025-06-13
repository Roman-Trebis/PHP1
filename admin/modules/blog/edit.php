<?php

$cats = R::find('categories', 'ORDER BY title ASC');

if (isset($_POST['postEdit'])) {

    if (trim($_POST['title']) == '') {
        $_SESSION['errors'][] = ['title' => 'Введите заголовок поста'];
    }

    if (trim($_POST['content']) == '') {
        $_SESSION['errors'][] = ['title' => 'Заполните содержимое поста'];
    }

    if (empty($_SESSION['errors'])) {

        $post = R::load('posts', $_GET['id']);
        $post->title = $_POST['title'];
        $post->cat = $_POST['cat'];
        $post->content = $_POST['content'];
        $post->editTime = time();

        if (isset($_POST['delete-cover']) && $_POST['delete-cover'] == 'on') {

            $coverFolderLocation = ROOT . 'usercontent/blog/';

            if (file_exists(ROOT . 'usercontent/blog/' . $post->cover) && !empty($user->cover)) {
                unlink(ROOT . 'usercontent/blog/' . $post->cover);
            }
            if (file_exists(ROOT . 'usercontent/blog/' . $post->coverSmall) && !empty($user->coverSmall)) {
                unlink(ROOT . 'usercontent/blog/' . $post->coverSmall);
            }

            $post->cover = NULL;
            $post->cover_small = NULL;
        }

        if (isset($_FILES['cover']['name']) && $_FILES['cover']['tmp_name'] !== '') {
            $coverFileName = saveUploadedImg('cover', [600, 300], 12, 'blog', [1110, 460], [290, 230]);

            if ($coverFileName) {
                if (file_exists(ROOT . 'usercontent/blog/' . $post->cover) && !empty($user->cover)) {
                    unlink(ROOT . 'usercontent/blog/' . $post->cover);
                }
                if (file_exists(ROOT . 'usercontent/blog/' . $post->coverSmall) && !empty($user->coverSmall)) {
                    unlink(ROOT . 'usercontent/blog/' . $post->coverSmall);
                }
            }

            $post->cover = $coverFileName[0];
            $post->coverSmall = $coverFileName[1];
        }

        R::store($post);
        $_SESSION['success'][] = ['title' => 'Пост успешно обновлен'];
    }
}

$post = R::load('posts', $_GET['id']);

ob_start();
include ROOT . 'admin/templates/blog/edit.tpl';
$content = ob_get_contents();
ob_end_clean();

include ROOT . 'admin/templates/template.tpl';
