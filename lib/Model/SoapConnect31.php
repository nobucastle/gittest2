<?php
ini_set("soap.wsdl_cache_enabled", "0");

//ToolKitを解凍したフォルダ内の saopclient配下のファイルを指定
require_once './ForceComToolkitForPHPmaster/soapclient/SforcePartnerClient.php';
require_once ("./ForceComToolkitForPHPmaster/soapclient/SforceHeaderOptions.php");

//ToolKitを解凍したフォルダ内の partner.wsdl.xmlファイルを指定
$wsdl = "./Force.com-Toolkit-for-PHP-master/soapclientpartner.wsdl.xml";

// Salesforce Login information
$userName = "renkei@komei.jp";
$password = "ren1117sW7p2ixCUDsz0DZL6ErzBtA3";
 
// Process of logging on and getting a salesforce.com session
$client = new SforcePartnerClient();
$client->createConnection($wsdl);
$loginResult = $client->login($userName, $password);

$query = "SELECT kaitei_soshiki_nm__c, genkyu__c, kaitei_ymd__c, syokan__c, shinki_ymd__c, chuo_ymd__c, kaitei_flg__c FROM PT_seicho_kaitei__c where NAME = '改訂#7526S'";
// $query = "select name, giin_cd__c from tou_jinji__c where giin_cd__c = '13020321'";
$response = $client->query($query);
$queryResult = new QueryResult($response);
var_dump($queryResult);
//echo $queryResult->records[0]->any;

//   foreach ($queryResult->records as $record) {
// 	  $sssiii = $record->any;
// 	  $sssiii1 = str_replace("sf:", "", $sssiii);
//       echo str_replace("sf:", "", $sssiii);
// 	  echo "<br>";
//   }

// 連想配列に変換する場合
//$xmlstr = (string)$queryResult->records[0]->any;
//$xml = new SimpleXMLElement($xmlstr);
//echo $xmlstr;
	
// $objの中身を展開
////// $txt = xnonce_debug_dumpvars('obj', $queryResult);

// 出力するならこんな感じで。
////// print '<pre>' . xnonce_debug_dumpvars('obj', $queryResult) . '</pre>';

echo '<br/>-------------------------------<br/><br/>';

$objArray = array();
$records = $queryResult->records;

foreach ($records as $record) {
    $any = $record->any;
    $xml = '<?xml version="1.0" ?><root>' . $any .  '</root>';
    $sx = simplexml_load_string($xml);
    array_push($objArray, (array)$sx);
}
var_dump($objArray);

echo '<br/>-------------------------------<br/><br/>';
echo $objArray[0]["sf:kaitei_soshiki_nm__c"]; 
	
foreach ($objArray as $obj) {
    echo "【組織名】" . $obj["sf:kaitei_soshiki_nm__c"] . "　【改訂日】" . $obj["sf:kaitei_ymd__c"] . "<br/>";
}







$query1 = "SELECT kousei__r.name, yakusyoku__c FROM PT_seicho_kousei__c where kaitei__c = 'a255F00000XD6Qu'";
$response = $client->query($query1);
$queryResult = new QueryResult($response);

$objArray1 = array();
$records = $queryResult->records;
var_dump($records);

foreach ($records as $record) {
    $any = $record->any;
    $xml = '<?xml version="1.0" ?><root>' . $any .  '</root>';
    $sx = simplexml_load_string($xml);
	array_push($objArray1, (array)$sx);
}

/**var_dump($objArray);**/
foreach ($objArray as $obj) {
    echo "【名前】" . $obj["sf:name"] . "　【役職】" . $obj["sf:yakusyoku__c"] . "<br/>";
}



/**
 * オブジェクトや変数の中身を分かりやすくリストアップしたものを取得
 * @param  String $name $valが変数や配列だった場合の出力に使うラベルテキスト。
 * @param  Any $val  出力対象の変数またはオブジェクト。
 * @return String       リストアップされた変数、プロパティ、メソッドのリスト。
 */
function xnonce_debug_dumpvars($name, $val)
{
    // if (!isset($val)) {return ('');}
    if (is_array($val)) {
        ksort($val);
        foreach ($val as $key => $contents) {
            $key = $name . "['" . $key . "']";
            $ret .= xnonce_debug_dumpvars($key, $contents);
        }
    } else if (is_object($val)) {
        $className = get_class($val);
        $vars = get_class_vars($className);
        $props = get_object_vars($val);
        $methods = get_class_methods($className);
        // if (is_array($vars) && count($vars) > 0) {
        //     $key = 'OBJECT:' . $className . '->(static)';
        //     $ret .= xnonce_debug_dumpvars($key, $vars);
        // }
        if (is_array($props) && count($props) > 0) {
            $key = 'OBJECT:' . $className . '->(property)';
            $ret .= xnonce_debug_dumpvars($key, $props);
        }
        if (is_array($methods) && count($methods) > 0) {
            $key = 'OBJECT:' . $className . '->(method)';
            $ret .= xnonce_debug_dumpvars($key, $methods);
        }
    } else {
        if (is_numeric($val)) {
            $ret = '$' . $name . ' = ' . $val . ";\n";
        } else {
            $val = htmlspecialchars($val);
            $val = preg_replace('/[\r\n]/', '\\n ', $val);
            // $val = mb_strimwidth($val, 0, 40, '…', 'UTF-8');
            $ret = '$' . $name . ' = \'' . $val . "';\n";
        }
    }
    return ($ret);
}
?>