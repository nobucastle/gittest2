<?php

ini_set('display_errors', 1);

require_once(__DIR__ . '/../lib/functions.php');
require_once(__DIR__ . '/autoload.php');

//データベース定義
define('DB_HOST_SENKYO', 'SRVSC2');
define('DB_DATABASE_SENKYO', 'senkyodb');
define('DB_USERNAME_SENKYO', 'infsenkyo');
define('DB_PASSWORD_SENKYO', 'infsenkyo0320');
define('PDO_DSN_SENKYO', 'sqlsrv:server=' . DB_HOST_SENKYO . ';database=' . DB_DATABASE_SENKYO);


define('SITE_URL', 'https://' . $_SERVER['HTTP_HOST']);

date_default_timezone_set('Asia/Tokyo');

session_start();

// フォーム再送信確認の回避
header('Expires:-1');
header('Cache-Control:');
header('Pragma:');
