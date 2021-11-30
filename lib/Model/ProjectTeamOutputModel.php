<?php

namespace SenkyoDBApp\Model;

class ProjectTeamOutputModel extends \SenkyoDBApp\Model {

	  
	/* 参議院　公明党増加率 */
	public function getGiinsInfo($values) {

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
		$client = new \SforcePartnerClient();
		$client->createConnection($wsdl);
		$loginResult = $client->login($userName, $password);
		
		$giin_iii = $values['giin_id'];

		//$query = "SELECT kaitei_soshiki_nm__c, genkyu__c, kaitei_ymd__c, syokan__c, shinki_ymd__c, chuo_ymd__c, kaitei_flg__c FROM PT_seicho_kaitei__c where NAME = '改訂#7526S'";
		$query = "SELECT kaitei_soshiki_nm__c, genkyu__c, kaitei_ymd__c, syokan__c, shinki_ymd__c, chuo_ymd__c, kaitei_flg__c, Id FROM PT_seicho_kaitei__c where NAME = '{$giin_iii}'";
		// $query = "select name, giin_cd__c from tou_jinji__c where giin_cd__c = '13020321'";
		$response = $client->query($query);
		$queryResult = new \QueryResult($response);
		//var_dump($queryResult);
	  
		$objArray = array();
		$records = $queryResult->records;

		foreach ($records as $record) {
			$any = $record->any;
			$anyany = str_replace("sf:", "", $any);
			$xml = '<?xml version="1.0" ?><root>' . $anyany .  '</root>';
			$sx = simplexml_load_string($xml);
			array_push($objArray, (array)$sx);
		}

		//var_dump($objArray);
		//echo '<br/>-------------------------------<br/><br/>';
		$rowid = $objArray[0]["Id"];
		//foreach ($objArray as $obj) {
		//	echo "【組織名】" . $obj["sf:kaitei_soshiki_nm__c"] . "　【改訂日】" . $obj["sf:kaitei_ymd__c"] . "<br/>";
		//}

	
		return $objArray;
	}
	
	
	/* 参議院　公明党増加率 */
	public function getGiinsInfo2($values) {

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
		$client = new \SforcePartnerClient();
		$client->createConnection($wsdl);
		$loginResult = $client->login($userName, $password);
		
		$giin_iii = $values['giin_id'];


		//$query = "SELECT kaitei_soshiki_nm__c, genkyu__c, kaitei_ymd__c, syokan__c, shinki_ymd__c, chuo_ymd__c, kaitei_flg__c FROM PT_seicho_kaitei__c where NAME = '改訂#7526S'";
		$query = "SELECT name, 	yakusyoku__c, giin_name_txt__c FROM PT_seicho_kousei__c WHERE kaitei__c = '{$giin_iii}' ORDER BY JUN__c";
		//echo $query;
		// $query = "select name, giin_cd__c from tou_jinji__c where giin_cd__c = '13020321'";
		$response = $client->query($query);
		$queryResult = new \QueryResult($response);
		//var_dump($queryResult);
	  
		$objArray = array();
		$records = $queryResult->records;

		foreach ($records as $record) {
			$any = $record->any;
			$anyany = str_replace("sf:", "", $any);
			$xml = '<?xml version="1.0" ?><root>' . $anyany .  '</root>';
			$sx = simplexml_load_string($xml);
			array_push($objArray, (array)$sx);
		}

		//var_dump($objArray);
		//echo '<br/>-------------------------------<br/><br/>';
		//foreach ($objArray as $obj) {
		//	echo "【組織名】" . $obj["sf:kaitei_soshiki_nm__c"] . "　【改訂日】" . $obj["sf:kaitei_ymd__c"] . "<br/>";
		//}

	
		return $objArray;
	}
	
	
}