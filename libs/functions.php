<?php

function getModuleNameForAdmin()
{
    $uri = $_SERVER['REQUEST_URI'];
    $uriArr = explode('?', $uri);
    $uri = $uriArr[0];
    $uri = rtrim($uri, "/");
    $uri = substr($uri, 1);
    $uri = filter_var($uri, FILTER_SANITIZE_URL);
    $moduleNameArr = explode('/', $uri);
    $uriModule = isset($moduleNameArr[1]) ? $moduleNameArr[1] : null;
    return $uriModule;
}

function getModuleName()
{
    $uri = $_SERVER['REQUEST_URI'];
    $uriArr = explode('?', $uri);
    $uri = $uriArr[0];
    $uri = rtrim($uri, "/");
    $uri = substr($uri, 1);
    $uri = filter_var($uri, FILTER_SANITIZE_URL);
    $moduleNameArr = explode('/', $uri);
    $uriModule = $moduleNameArr[0];
    return $uriModule;
}

function getUriGet()
{
    $uri = $_SERVER['REQUEST_URI'];
    $uri = rtrim($uri, "/");
    $uri = filter_var($uri, FILTER_SANITIZE_URL);
    $uri = substr($uri, 1);
    $uri = explode('?', $uri);
    $uri = $uri[0];
    $uriArr = explode('/', $uri);
    $uriGet = isset($uriArr[1]) ? $uriArr[1] : null;
    return $uriGet;
}

function getUriGetParam()
{
    $uri = $_SERVER['REQUEST_URI'];
    $uri = rtrim($uri, "/");
    $uri = filter_var($uri, FILTER_SANITIZE_URL);
    $uri = substr($uri, 1);
    $uri = explode('?', $uri);
    $uri = $uri[0];
    $uriArr = explode('/', $uri);
    $uriGet = isset($uriArr[2]) ? $uriArr[2] : null;
    return $uriGet;
}

function rus_date()
{
    $translate = array(
        "am" => "дп",
        "pm" => "пп",
        "AM" => "ДП",
        "PM" => "ПП",
        "Monday" => "Понедельник",
        "Mon" => "Пн",
        "Tuesday" => "Вторник",
        "Tue" => "Вт",
        "Wednesday" => "Среда",
        "Wed" => "Ср",
        "Thursday" => "Четверг",
        "Thu" => "Чт",
        "Friday" => "Пятница",
        "Fri" => "Пт",
        "Saturday" => "Суббота",
        "Sat" => "Сб",
        "Sunday" => "Воскресенье",
        "Sun" => "Вс",
        "January" => "Января",
        "Jan" => "Янв",
        "February" => "Февраля",
        "Feb" => "Фев",
        "March" => "Марта",
        "Mar" => "Мар",
        "April" => "Апреля",
        "Apr" => "Апр",
        "May" => "Мая",
        "June" => "Июня",
        "Jun" => "Июн",
        "July" => "Июля",
        "Jul" => "Июл",
        "August" => "Августа",
        "Aug" => "Авг",
        "September" => "Сентября",
        "Sep" => "Сен",
        "October" => "Октября",
        "Oct" => "Окт",
        "November" => "Ноября",
        "Nov" => "Ноя",
        "December" => "Декабря",
        "Dec" => "Дек",
        "st" => "ое",
        "nd" => "ое",
        "rd" => "е",
        "th" => "ое"
    );

    if (func_num_args() > 1) {
        return strtr(date(func_get_arg(0), func_get_arg(1)), $translate);
    } else {
        return strtr(date(func_get_arg(0)), $translate);
    }
}

function pagination($results_per_page, $type, $params = null)
{
    if (empty($params)) {
        $number_of_results = R::count($type);
    } else {
        $number_of_results = R::count($type, $params[0], $params[1]);
    }

    $number_of_pages = ceil($number_of_results / $results_per_page);

    if (!isset($_GET['page'])) {
        $page_number = 1;
    } else {
        $page_number = $_GET['page'];
    }

    if ($page_number > $number_of_pages) {
        $page_number = $number_of_pages;
    }

    $starting_limit_number = ($page_number - 1) * $results_per_page;

    $sql_pages_limit = "LIMIT {$starting_limit_number}, $results_per_page";

    $result['number_of_pages'] = $number_of_pages;
    $result['page_number'] = $page_number;
    $result['sql_pages_limit'] = $sql_pages_limit;
    return $result;
}

function saveUploadedImg($inputFileName, $minSize, $maxFileSizeMb, $folderName, $fullSize, $smallSize)
{
    $fileName = $_FILES[$inputFileName]["name"];
    $fileTmpLoc = $_FILES[$inputFileName]["tmp_name"];
    $fileType = $_FILES[$inputFileName]["type"];
    $fileSize = $_FILES[$inputFileName]["size"];
    $fileErrorMsg = $_FILES[$inputFileName]["error"];
    $kaboom = explode(".", $fileName);
    $fileExt = end($kaboom);

    list($width, $height) = getimagesize($fileTmpLoc);
    if ($width < $minSize[0] || $height < $minSize[1]) {
        $_SESSION['errors'][] = [
            'title' => 'Изображение слишком маленького размера.',
            'desc' => 'Загрузите изображение c размерами от 600x300 или более.'
        ];
    }

    if ($fileSize > ($maxFileSizeMb * 1024 * 1024)) {
        $_SESSION['errors'][] = ['title' => 'Файл изображения не должен быть более 12 Mb'];
    }

    if (!preg_match("/\.(gif|jpg|jpeg|png)$/i", $fileName)) {
        $_SESSION['errors'][]  = ['title' => 'Неверный формат файла', 'desc' => '<p>Файл изображения должен быть в формате gif, jpg, jpeg, или png.</p>'];
    }

    if ($fileErrorMsg == 1) {
        $_SESSION['errors'][] = ['title' => 'При загрузке изображения произошла ошибка. Повторите попытку'];
    }

    if (empty($_SESSION['errors'])) {
        $imgFolderLocation = ROOT . "usercontent/{$folderName}/";
        $db_file_name = rand(100000000000, 999999999999) . "." . $fileExt;
        $filePathFullSize = $imgFolderLocation . $db_file_name;
        $filePathSmallSize = $imgFolderLocation . $smallSize[0] . '-' . $db_file_name;

        $resultFullSize = resize_and_crop($fileTmpLoc, $filePathFullSize, $fullSize[0], $fullSize[1]);
        $resultSmallSize = resize_and_crop($fileTmpLoc, $filePathSmallSize, $smallSize[0], $smallSize[1]);

        if ($resultFullSize != true || $resultSmallSize != true) {
            $_SESSION['errors'][] = ['title' => 'Ошибка сохранения файла'];
            return false;
        }

        return [$db_file_name, $smallSize[0] . '-' . $db_file_name];
    }
}

function saveUploadedFile($inputFileName, $maxFileSizeMb, $folderName)
{
    $fileName = $_FILES[$inputFileName]["name"];
    $fileTmpLoc = $_FILES[$inputFileName]["tmp_name"];
    $fileType = $_FILES[$inputFileName]["type"];
    $fileSize = $_FILES[$inputFileName]["size"];
    $fileErrorMsg = $_FILES[$inputFileName]["error"];
    $kaboom = explode(".", $fileName);
    $fileExt = end($kaboom);

    if ($fileSize > ($maxFileSizeMb * 1024 * 1024)) {
        $_SESSION['errors'][] = ['title' => 'Файл изображения не должен быть более 12 Mb'];
    }

    if (!preg_match("/\.(gif|jpg|jpeg|png|pdf|zip|rar|doc|docx)$/i", $fileName)) {
        $_SESSION['errors'][]  = ['title' => 'Неверный формат файла', 'desc' => '<p>Файл должен быть в формате gif, jpg, jpeg, png, rar, zip, doc, docx, pdf.</p>'];
    }

    if ($fileErrorMsg == 1) {
        $_SESSION['errors'][] = ['title' => 'При загрузке изображения произошла ошибка. Повторите попытку'];
    }

    if (empty($_SESSION['errors'])) {
        $fileFolderLocation = ROOT . "usercontent/{$folderName}/";
        $db_file_name = rand(100000000000, 999999999999) . "." . $fileExt;
        $newFilePath = $fileFolderLocation . $db_file_name;

        $result = move_uploaded_file($fileTmpLoc, $newFilePath);

        if (!$result) {
            $_SESSION['errors'][] = ['title' => 'Ошибка сохранения файла'];
            return false;
        }

        return [$db_file_name, $fileName];
    }
}

function get_related_posts($postTitle)
{
    $wordsArray = explode(' ', $postTitle);
    $wordsArray = array_unique($wordsArray);

    $stopWords = ['и', 'на', 'в', 'а', 'под', 'если', 'за', '-', 'что', 'самом', 'деле', 'означает'];

    $newWordsArray = array();

    foreach ($wordsArray as $word) {
        $word = mb_strtolower($word);
        $word = str_replace('"', "", $word);
        $word = str_replace("'", "", $word);
        $word = str_replace("»", "", $word);
        $word = str_replace("«", "", $word);
        $word = str_replace(",", "", $word);
        $word = str_replace(".", "", $word);

        if (!in_array($word, $stopWords)) {
            if (mb_strlen($word) > 4) {
                $word = mb_substr($word, 0, -2);
            } else if (mb_strlen($word) > 3) {
                $word = mb_substr($word, 0, -1);
            }
            $word = '%' . $word . '%';
            $newWordsArray[] = $word;
        }
    }

    $sqlQuery = 'SELECT id, title, cover_small FROM `posts` WHERE ';
    for ($i = 0; $i < count($newWordsArray); $i++) {
        if ($i + 1 == count($newWordsArray)) {
            $sqlQuery .= 'title LIKE ?';
        } else {
            $sqlQuery .= 'title LIKE ? OR ';
        }
    }

    $sqlQuery .= ' ORDER BY RAND() LIMIT 3';

    return R::getAll($sqlQuery, $newWordsArray);
}
