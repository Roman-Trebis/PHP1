<?php


define('DB_HOST', 'database');
define('DB_NAME', 'projectsfive');
define('DB_USER', 'root');
define('DB_PASS', 'tiger');


if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
    $protocol = 'https://';
} else {
    $protocol = 'http://';
}


define('HOST', $protocol . $_SERVER['HTTP_HOST'] . '/');


define('ROOT', dirname(__FILE__) . '/');


define('SITE_NAME', 'Сайт Digital Nomad');
define('SITE_EMAIL', 'info@project.com');
