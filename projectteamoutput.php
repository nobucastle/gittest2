<?php
require_once('config/config.php');
require 'vendor/autoload.php';


ini_set( 'display_errors', 1 );
ini_set( 'error_reporting', E_ALL );

// Spreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xls as XlsReader;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx as Reader;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;


$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('./excels/pt_format.xls');
$sheet = $spreadsheet->getActiveSheet();


if(isset($_GET['giin_cd'])){
	$giinCd = $_GET['giin_cd'];
} else{
	$giinCd = "改訂#7526S";
}

$app = new SenkyoDBApp\Controller\ProjectTeamOutput();
$app->run($giinCd);


$giins = $app->getValues()->giins;
//var_dump($giins);
$soshikiname =  $giins[0]["kaitei_soshiki_nm__c"];
$shinsetsuymd = str_replace("-", "/", $giins[0]["shinki_ymd__c"]);
$kaiteiymd = str_replace("-", "/", $giins[0]["kaitei_ymd__c"]);
$kaiteiymd_file = $giins[0]["kaitei_ymd__c"];
$kaiteiflg =  $giins[0]["kaitei_flg__c"];
$syokan =  $giins[0]["syokan__c"];
$returnurl =  $giins[0]["Id"];



//foreach ($giins as $obj) {
//	echo "【組織名】" . $obj["kaitei_soshiki_nm__c"] . "　【改訂日】" . $obj["kaitei_ymd__c"] . "<br/>";
//}

$giinRow = $giins[0]["Id"]; 
$app->run2($giinRow);

$giins2 = $app->getValues()->giins2;

$i = 8;

//foreach ($giins2 as $obj) {
//	echo "【役職名】" . $obj["yakusyoku__c"] . "　【役員名】" . $obj["giin_name_txt__c"] . "<br/>";
//}


foreach ($giins2 as $obj) {
	$sheet->setCellValue('A'.$i, $obj["yakusyoku__c"]);
	$sheet->setCellValue('B'.$i, $obj["giin_name_txt__c"]);
	if ($obj["gikai_name__c"] == '衆議院' || $obj["gikai_name__c"] == '参議院') {
	}else{
	$sheet->setCellValue('C'.$i, $obj["gikai_name__c"]);
	}
	$sheet->getRowDimension($i)->setRowHeight(21.75);
	$i = $i + 1;
}




$space_char = "  ";
$today = date("Y/m/d")." 現在";





  //得票数
$sheet->setCellValue('A1', $soshikiname);
$sheet->setCellValue('A5', "設 置 日 ： ".$shinsetsuymd);
$sheet->setCellValue('A6', "改 訂 日 ： ".$kaiteiymd."（".$kaiteiflg."）");
$sheet->setCellValue('C3', $today);
$sheet->setCellValue('C4', $syokan);


//ヘッダー指定
//$sheet->getHeaderFooter()->setOddHeader("&L&19 履歴カード  &R&16 " . date("Y/m/d H:i") . "現在");

// バッファをクリア
ob_end_clean();

$fileName = "体制表(" . $soshikiname . $kaiteiymd_file. ").xlsx";

// ダウンロード
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header("Content-Disposition: attachment; filename=\"{$fileName}\"; filename*=utf-8''" . rawurlencode($fileName));
header('Cache-Control: max-age=0');
header('Cache-Control: max-age=1');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
header('Cache-Control: cache, must-revalidate');
header('Pragma: public');

$writer = new Xlsx($spreadsheet);
$writer->save('php://output');

$spreadsheet->disconnectWorksheets();
$spreadsheet->garbageCollect();


exit();

//header("https://komei.my.salesforce.com/"+$returnurl);
