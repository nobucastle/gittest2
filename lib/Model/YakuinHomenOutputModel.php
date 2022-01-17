<?php

namespace SenkyoDBApp\Model;

class YakuinHomenOutputModel extends \SenkyoDBApp\Model {


	  
	/* PT・対策本部ヘッダー情報 */
	public function getGiinsInfo($values) {


		// セールスフォース接続
		$client = new \SforcePartnerClient();
		$client->createConnection(SF_XML);
		$loginResult = $client->login(SF_USER, SF_PW);

		
		$giin_iii = $values['giin_id'];

		//データ取得
		$query = "SELECT homen_name__c, genkyu__c, kaitei_ymd__c, kaitei_flg__c, Id FROM homen_kaitei__c where NAME = '{$giin_iii}'";
		$response = $client->query($query);
		$queryResult = new \QueryResult($response);
	  
		$objArray = array();
		$records = $queryResult->records;

		//取得データをXMLファイルとして格納
		foreach ($records as $record) {
			$any = $record->any;
			$anyany = str_replace("sf:", "", $any);
			$xml = '<?xml version="1.0" ?><root>' . $anyany .  '</root>';
			$sx = simplexml_load_string($xml);
			array_push($objArray, (array)$sx);
		}
		//$rowid = $objArray[0]["Id"];
	
		return $objArray;
	}
	
	
	/* PT・対策本部構成員情報 */
	public function getGiinsInfo2($values) {

		// セールスフォース接続
		$client = new \SforcePartnerClient();
		$client->createConnection(SF_XML);
		$loginResult = $client->login(SF_USER, SF_PW);
		
		$giin_iii = $values['giin_id'];

		//データ取得
		$query = "SELECT name, yakusyoku__c, giin_name_txt__c, gikai_name__c, kisu__c, nenrei__c, gen_flg__c FROM homen_jinji__c WHERE kaitei__c = '{$giin_iii}' ORDER BY hyoji__c";
		$response = $client->query($query);
		$queryResult = new \QueryResult($response);

		$objArray = array();
		$records = $queryResult->records;

		//取得データをXMLファイルとして格納
		foreach ($records as $record) {
			$any = $record->any;
			$anyany = str_replace("sf:", "", $any);
			$xml = '<?xml version="1.0" ?><root>' . $anyany .  '</root>';
			$sx = simplexml_load_string($xml);
			array_push($objArray, (array)$sx);
		}


		return $objArray;
	}
	
	
}