<?php

namespace SenkyoDBApp\Model;

class ProjectTeamHikakuOutputModel extends \SenkyoDBApp\Model {


	  
	/* 現体制・PT・対策本部ヘッダー情報 */
	public function getGiinsInfo($values) {


		// セールスフォース接続
		$client = new \SforcePartnerClient();
		$client->createConnection(SF_XML);
		$loginResult = $client->login(SF_USER, SF_PW);

		
		$giin_iii = $values['giin_id'];

		//データ取得
		$query = "SELECT kaitei_soshiki_nm__c, soshiki_name__c, genkyu__c, kaitei_ymd__c, syokan__c, shinki_ymd__c, kaitei_flg__c, Id FROM PT_seicho_kaitei__c where NAME = '{$giin_iii}' and kaitei_ymd__c != null";
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
	
	
	/* 現体制・PT・対策本部構成員情報 */
	public function getGiinsInfo2($values) {

		// セールスフォース接続
		$client = new \SforcePartnerClient();
		$client->createConnection(SF_XML);
		$loginResult = $client->login(SF_USER, SF_PW);
		
		$giin_iii = $values['giin_id'];

		//データ取得
		$query = "SELECT name, yakusyoku__c, giin_name_txt__c, genshin_flg__c, gikai_name__c FROM PT_seicho_kousei__c WHERE kaitei__c = '{$giin_iii}' ORDER BY JUN__c";
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
	
	/* 新体制・PT・対策本部ヘッダー情報 */
	public function getGiinsInfo3($values) {


		// セールスフォース接続
		$client = new \SforcePartnerClient();
		$client->createConnection(SF_XML);
		$loginResult = $client->login(SF_USER, SF_PW);

		
		$giin_iii = $values['giin_id'];
		$giin_iii2 = $values['giin_id2'];

		//データ取得
		$query = "SELECT kaitei_soshiki_nm__c, soshiki_name__c, genkyu__c, kaitei_ymd__c, syokan__c, kaitei_flg__c, Id FROM PT_seicho_kaitei__c where soshiki_name__c = '{$giin_iii}' and NAME <> '{$giin_iii2}' and kaitei_ymd__c != null order by kaitei_ymd__c desc";
		$response = $client->query($query);
		var_dump($query);
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
	
	/* 現体制・PT・対策本部構成員情報 */
	public function getGiinsInfo4($values) {

		// セールスフォース接続
		$client = new \SforcePartnerClient();
		$client->createConnection(SF_XML);
		$loginResult = $client->login(SF_USER, SF_PW);
		
		$giin_iii = $values['giin_id'];

		//データ取得
		$query = "SELECT name, yakusyoku__c, giin_name_txt__c, genshin_flg__c, gikai_name__c FROM PT_seicho_kousei__c WHERE kaitei__c = '{$giin_iii}' ORDER BY JUN__c";
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