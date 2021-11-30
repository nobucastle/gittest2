<?php

ini_set('display_errors', 1);

require_once(__DIR__ . '/../lib/functions.php');
require_once(__DIR__ . '/autoload.php');

//データベース定義
define('DB_HOST_KOKUSEI', 'SRVSC2');
define('DB_DATABASE_KOKUSEI', 'kokuseidb');
define('DB_USERNAME_KOKUSEI', 'infkokusei');
define('DB_PASSWORD_KOKUSEI', 'kokusei2003');
define('PDO_DSN_KOKUSEI', 'sqlsrv:server=' . DB_HOST_KOKUSEI . ';database=' . DB_DATABASE_KOKUSEI);


define('SITE_URL', 'https://' . $_SERVER['HTTP_HOST']);

date_default_timezone_set('Asia/Tokyo');

session_start();

// フォーム再送信確認の回避
header('Expires:-1');
header('Cache-Control:');
header('Pragma:');
