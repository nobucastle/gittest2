<?php

function h($s) {
  return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}

//数値チェック
function isNumber($value) {
  if (preg_match("/^[0-9]+$/", $value)) {
    return true;
  } else {
    return false;
  }
}

//桁数チェック
//$value : 文字列
//$len : 最大値
function isLengthOver($value, $len) {
  if (mb_strlen($value) > $len) {
    return true;
  } else {
    return false;
  }
}

//電話番号チェック（簡易）
//半角数字＋半角ハイフン(任意)で10桁以上13桁以下を許可
function isTelephoneno($value) {
  if (preg_match("/^[0-9-]{10,13}+$/", $value)) {
    return true;
  } else {
    return false;
  }
}

//メールドレスチェック
//半角英数　記号（.-_）許可　@必要
function isMailAddress($adrs) {
  if (preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $adrs)) {
      return true;
  } else {
      return false;
  }
}

//性別：コードを文字に変更
function SeibetsuFlg($value) {
  if ($value == "0") {
    return "男";
  } else {
    return "女";
  }
}


//推薦議員：コードを文字に変更
function SuisenFlg($value) {
  if ($value == "0") {
    return "";
  } elseif ($value == "1") {
    return "＜ 推 薦 ＞";
  }
}

//年齢：生年月日8桁コードから年齢を算出
function SeinenymdNenrei($birthday, $code) {
	$today = date('Ymd');
	return floor(($today - $birthday) / 10000) . ($code === 1 ? '歳' : '');
}


//郵便番号：コードを書式付に変更
function YubinFormat($value, $code = 1) {

	$yubin_mae = substr($value, 0 , 3);
	$yubin_ushiro = substr($value, -4);
	return ($code == 1 ? "〒" : "").$yubin_mae."-".$yubin_ushiro;
	
}

//郵便番号：コードを書式付に変更(ハイフン前後でわかれている場合)
function YubinFormat2($value1, $value2, $code = 1) {
	return ($code == 1 ? "〒" : "").$value1."-".$value2;	
}

//和暦を西暦に変換
function WarekiSeirekiYm($value, $nenge) {

  if ($value == " "){
	  return "";
  } else {
	  $nen = substr($nenge,0,2);
	  $getsu = substr($nenge,2,2);
	  
	  if ($value == "4") {
		  $nen1 = 2018 + intval($nen);
	  } elseif ($value == "3") {
		  $nen1 = 1988 + intval($nen);
	  } elseif ($value == "2") {
		  $nen1 = 1925 + intval($nen);
	  } elseif ($value == "1") {
		  $nen1 = 1911 + intval($nen);
	  } elseif ($value == "0") {
		  $nen1 = 1867 + intval($nen);
	  }
	  
	  return $nen1."年".$getsu."月";
  }
}


//和暦・年月日をを西暦に変換
function WarekiSeirekiYmd($value, $nenge, $code = '') {

  $rtnValue = "";

  if ($value == " "){
	  return "";
  } else {
	  $nen = substr($nenge,0,2);
	  $getsu = substr($nenge,2,2);
	  $hizuke = substr($nenge,4,2);
	  
	  if ($value == "4") {
		  $nen1 = 2018 + intval($nen);
	  } elseif ($value == "3") {
		  $nen1 = 1988 + intval($nen);
	  } elseif ($value == "2") {
		  $nen1 = 1925 + intval($nen);
	  } elseif ($value == "1") {
		  $nen1 = 1911 + intval($nen);
	  } elseif ($value == "0") {
		  $nen1 = 1867 + intval($nen);
	  }
	  
    $rtnValue = $code === '' ? ($nen1."年".$getsu."月".$hizuke."日") : ($nen1.$code.$getsu.$code.$hizuke);

	  return $rtnValue;
  }
}

//西暦８桁を年月日に変換
function SeirekiYmd($nenge, $code = '') {

  $rtnValue = "";

  if (mb_strlen($nenge) != 8) {
    return $nenge;
  }

  $nen = intval(substr($nenge,0,4));
  $getsu = intval(substr($nenge,4,2));
  $hizuke = intval(substr($nenge,6,2));

  $rtnValue = $code === '' ? ($nen."年".$getsu."月".$hizuke."日") : ($nen.$code.$getsu.$code.$hizuke);
  
  return $rtnValue;

}

//フラグを議員種別に変換
function GenshinFlg($value) {

  if ($value == "0") {
    return "新";
  } elseif ($value == "1") {
    return "現";
  } elseif ($value == "2") {
    return "前";
  } elseif ($value == "3") {
    return "元";
  }
  return "";
}

//フラグを各種記号に変換
function FlgToMark($value) {

	$rtnVal = "";

  if ($value->DATA6 == 1) {
    $rtnVal .= "推";
  }
	
  if ($value->DATA7 == 1) {
    $rtnVal .= "※";
  }
	
	if ($value->DATA12 == "議員団長") {
    $rtnVal .= "◇";
  } elseif ($value->DATA12 == "幹事長") {
    $rtnVal .= "◎";
  } elseif ($value->DATA12 == "副幹事長") {
    $rtnVal .= "○";
  }
	


  return $rtnVal;
}

//議会分類を取得
function getGikaiClass($value) {
  $rtnVal = "";
  if ($value >= 30 && $value <= 99) {
    $rtnVal = "都道府県議会";
  } elseif ($value == 21 || $value == 26) {
    $rtnVal = "衆議院";
  } elseif ($value == 20 || $value == 25) {
    $rtnVal = "参議院";
  } elseif ($value >= 100 && $value <= 199) {
    $rtnVal = "特別区・政令市議会";
  } elseif ($value >= 200 && $value <= 299) {
    $rtnVal = "市議会";
  } elseif ($value >= 300) {
    $rtnVal = "町村議会";
  }
  return $rtnVal;
}

//選挙種別を取得
function getSenkyoType($value) {
  $rtnVal = "";
  if ($value == "1") {
    $rtnVal = "一般市";
  } elseif ($value == "2") {
    $rtnVal = "県知事";
  } elseif ($value == "3") {
    $rtnVal = "県都市";
  } elseif ($value == "4") {
    $rtnVal = "政令市";
  } elseif ($value == "5") {
    $rtnVal = "東京特別区";
  }
  return $rtnVal;
}

//曜日取得
function getYobi($value) {
  $week = [
    '日', //0
    '月', //1
    '火', //2
    '水', //3
    '木', //4
    '金', //5
    '土', //6
  ];

  return $week[$value];
}

function getTaido($value) {
  $rtnVal = "";
  if ($value == "0") {
    $rtnVal = "支持";
  } elseif ($value == "1") {
    $rtnVal = "自主投票";
  } elseif ($value == "2") {
    $rtnVal = "推薦";
  } elseif ($value == "4") {
    $rtnVal = "態度未決定";
  } elseif ($value == "5") {
    $rtnVal = "県本部推薦";
  } elseif ($value == "6") {
    $rtnVal = "県本部支持";
  } elseif ($value == "3") {
    $rtnVal = "その他";
  } else {
    $rtnVal = "";
  }
  return $rtnVal;
}

function getTaha($value) {
  $rtnVal = "";
  if ($value == "99") {
    $rtnVal = "無";
  } elseif ($value == "03") {
    $rtnVal = "自民";
  } elseif ($value == "13") {
    $rtnVal = "民主";
  } elseif ($value == "10") {
    $rtnVal = "共産";
  } elseif ($value == "36") {
    $rtnVal = "維新";
  } elseif ($value == "00") {
    $rtnVal = "その他";
  } elseif ($value == "88") {
    $rtnVal = "";
  }
  return $rtnVal;
}

