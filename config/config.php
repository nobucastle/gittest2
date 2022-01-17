<?php

ini_set('display_errors', 1);
ini_set("soap.wsdl_cache_enabled", "0");

require_once('lib/functions.php');
require_once('autoload.php');

//セールスフォース接続用設定ファイル
require_once ('ForceComToolkitForPHPmaster/soapclient/SforcePartnerClient.php');
require_once ('ForceComToolkitForPHPmaster/soapclient/SforceHeaderOptions.php');

//データベース定義
define('DB_HOST_SENKYO', 'SRVSC1');
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

// セールスフォースとの接続情報
define('SF_XML','./Force.com-Toolkit-for-PHP-master/soapclientpartner.wsdl.xml');
define('SF_USER','renkei@komei.jp');
define('SF_PW','ren1117sW7p2ixCUDsz0DZL6ErzBtA3');

