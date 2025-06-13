<?php

require "./../resize.php";

if (isset($_FILES['upload']['name']) && $_FILES['upload']['tmp_name'] !== '') {

    $fileName = $_FILES["upload"]["name"];
    $fileTmpLoc = $_FILES["upload"]["tmp_name"];
    $fileType = $_FILES["upload"]["type"];
    $fileSize = $_FILES["upload"]["size"];
    $fileErrorMsg = $_FILES["upload"]["error"];
    $kaboom = explode(".", $fileName);
    $fileExt = end($kaboom);

    list($width, $height) = getimagesize($fileTmpLoc);
    if ($width < 1 || $height < 1) {
        $message = "Изображение слишком маленького размера.";
    }

    if ($fileSize > 12582912) {
        $message = "Файл изображения не должен быть более 12 Mb";
    }

    if (!preg_match("/\.(gif|jpg|jpeg|png)$/i", $fileName)) {
        $message = "Файл изображения должен быть в формате gif, jpg, jpeg, или png.";
    }

    if ($fileErrorMsg == 1) {
        $message = "При загрузке изображения произошла ошибка. Повторите попытку";
    }

    if (empty($_SESSION['errors'])) {

        $coverFolderLocation = ROOT . 'usercontent/editor-uploads/';

        $db_file_name = rand(100000000000, 999999999999) . "." . $fileExt;
        $uploadfile = $coverFolderLocation . $db_file_name;

        if ($width > 920 || $height > 920) {
            $result = resize($fileTmpLoc, $uploadfile, 920);

            if ($result != true) {
                $message = 'Ошибка сохранения файла при масштабировании';
                return false;
            }
        } else {
            $result = move_uploaded_file($fileTmpLoc, $uploadfile);

            if ($result != true) {
                $message = 'Ошибка перемещения файла';
                return false;
            }
        }

        $url = HOST . "usercontent/editor-uploads/" . $db_file_name;

        $message = "Файл успешно загружен";
    }
}
