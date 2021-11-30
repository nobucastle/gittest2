<?php

namespace SenkyoDBApp\Model;

class KubichoOutputModel extends \SenkyoDBApp\Model {

  /* KUBICHO_DETAIL */
  public function getKubicho($values) {

    $sql = <<<SQL
      SELECT KD.*, KM.ken_nm as ken_name 
      FROM KUBICHO_DETAIL KD
      LEFT OUTER JOIN infsenkyo.KEN_MST KM
      ON (KD.ken_cd = KM.ken_cd)
      WHERE ku_cd = :kucd and individual_key = :indkey
    SQL;

    $stmt = $this->dbsenkyo->prepare($sql);
    $stmt->execute([
      ':kucd' => $values['kucd'],
      ':indkey' => $values['indkey']
    ]);
    //$stmt->execute();
    $stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
    return $stmt->fetch();
  }

  /* K_KOHO_DETAL */
  public function getKohoDetail($values) {

    $sql = <<<SQL
      SELECT 
      KD.ku_cd as ku_cd1,
      KD.k_koho_name as k_koho_name1,
      KD.k_koho_kana as k_koho_kana1,
      KD.k_koho_nenrei as k_koho_nenrei1,
      KD.k_koho_toha as k_koho_toha1,
      KD.k_koho_yaku as k_koho_yaku1,
      KD.k_koho_shiji as k_koho_shiji1,
      KD.k_koho_toraku as k_koho_toraku1,
      KD.k_koho_hyo as k_koho_hyo1,
      KD.number as number1,
      KD.tohyo_date as tohyo_date1,
      KD.k_mutohyo_check as k_mutohyo_check1,
      KD.k_koho_taido as k_koho_taido1,
      KD.k_koho_taido_s as k_koho_taido_s1,
      KD.k_koho_kisu as k_koho_kisu1,
      KD.k_koho_genishin as k_koho_genishin1,
      KD.k_koho_suisen as k_koho_suisen1,
      KD2.ku_cd as ku_cd2,
      KD2.k_koho_name as k_koho_name2,
      KD2.k_koho_kana as k_koho_kana2,
      KD2.k_koho_nenrei as k_koho_nenrei2,
      KD2.k_koho_toha as k_koho_toha2,
      KD2.k_koho_yaku as k_koho_yaku2,
      KD2.k_koho_shiji as k_koho_shiji2,
      KD2.k_koho_toraku as k_koho_toraku2,
      KD2.k_koho_hyo as k_koho_hyo2,
      KD2.number as number2,
      KD2.tohyo_date as tohyo_date2,
      KD2.k_mutohyo_check as k_mutohyo_check2,
      KD3.ku_cd as ku_cd3,
      KD3.k_koho_name as k_koho_name3,
      KD3.k_koho_kana as k_koho_kana3,
      KD3.k_koho_nenrei as k_koho_nenrei3,
      KD3.k_koho_toha as k_koho_toha3,
      KD3.k_koho_yaku as k_koho_yaku3,
      KD3.k_koho_shiji as k_koho_shiji3,
      KD3.k_koho_toraku as k_koho_toraku3,
      KD3.k_koho_hyo as k_koho_hyo3,
      KD3.number as number3,
      KD3.tohyo_date as tohyo_date3,
      KD3.k_mutohyo_check as k_mutohyo_check3,
      KD4.ku_cd as ku_cd4,
      KD4.k_koho_name as k_koho_name4,
      KD4.k_koho_kana as k_koho_kana4,
      KD4.k_koho_nenrei as k_koho_nenrei4,
      KD4.k_koho_toha as k_koho_toha4,
      KD4.k_koho_yaku as k_koho_yaku4,
      KD4.k_koho_shiji as k_koho_shiji4,
      KD4.k_koho_toraku as k_koho_toraku4,
      KD4.k_koho_hyo as k_koho_hyo4,
      KD4.number as number4,
      KD4.tohyo_date as tohyo_date4,
      KD4.k_mutohyo_check as k_mutohyo_check4,
      KD5.ku_cd as ku_cd5,
      KD5.k_koho_name as k_koho_name5,
      KD5.k_koho_kana as k_koho_kana5,
      KD5.k_koho_nenrei as k_koho_nenrei5,
      KD5.k_koho_toha as k_koho_toha5,
      KD5.k_koho_yaku as k_koho_yaku5,
      KD5.k_koho_shiji as k_koho_shiji5,
      KD5.k_koho_toraku as k_koho_toraku5,
      KD5.k_koho_hyo as k_koho_hyo5,
      KD5.number as number5,
      KD5.tohyo_date as tohyo_date5,
      KD5.k_mutohyo_check as k_mutohyo_check5,
      KD6.ku_cd as ku_cd6,
      KD6.k_koho_name as k_koho_name6,
      KD6.k_koho_kana as k_koho_kana6,
      KD6.k_koho_nenrei as k_koho_nenrei6,
      KD6.k_koho_toha as k_koho_toha6,
      KD6.k_koho_yaku as k_koho_yaku6,
      KD6.k_koho_shiji as k_koho_shiji6,
      KD6.k_koho_toraku as k_koho_toraku6,
      KD6.k_koho_hyo as k_koho_hyo6,
      KD6.number as number6,
      KD6.tohyo_date as tohyo_date6,
      KD6.k_mutohyo_check as k_mutohyo_check6,
      KD7.ku_cd as ku_cd7,
      KD7.k_koho_name as k_koho_name7,
      KD7.k_koho_kana as k_koho_kana7,
      KD7.k_koho_nenrei as k_koho_nenrei7,
      KD7.k_koho_toha as k_koho_toha7,
      KD7.k_koho_yaku as k_koho_yaku7,
      KD7.k_koho_shiji as k_koho_shiji7,
      KD7.k_koho_toraku as k_koho_toraku7,
      KD7.k_koho_hyo as k_koho_hyo7,
      KD7.number as number7,
      KD7.tohyo_date as tohyo_date7,
      KD7.k_mutohyo_check as k_mutohyo_check7,
      KD8.ku_cd as ku_cd8,
      KD8.k_koho_name as k_koho_name8,
      KD8.k_koho_kana as k_koho_kana8,
      KD8.k_koho_nenrei as k_koho_nenrei8,
      KD8.k_koho_toha as k_koho_toha8,
      KD8.k_koho_yaku as k_koho_yaku8,
      KD8.k_koho_shiji as k_koho_shiji8,
      KD8.k_koho_toraku as k_koho_toraku8,
      KD8.k_koho_hyo as k_koho_hyo8,
      KD8.number as number8,
      KD8.tohyo_date as tohyo_date8,
      KD8.k_mutohyo_check as k_mutohyo_check8
      FROM K_KOHO_DETAIL KD,
      (SELECT * FROM K_KOHO_DETAIL
      WHERE ku_cd = :kucd2 and NUMBER = '2' and individual_key = :indkey2) KD2,
      (SELECT * FROM K_KOHO_DETAIL
      WHERE ku_cd = :kucd3 and NUMBER = '3' and individual_key = :indkey3) KD3,
      (SELECT * FROM K_KOHO_DETAIL
      WHERE ku_cd = :kucd4 and NUMBER = '4' and individual_key = :indkey4) KD4,
      (SELECT * FROM K_KOHO_DETAIL
      WHERE ku_cd = :kucd5 and NUMBER = '5' and individual_key = :indkey5) KD5,
      (SELECT * FROM K_KOHO_DETAIL
      WHERE ku_cd = :kucd6 and NUMBER = '6' and individual_key = :indkey6) KD6,
      (SELECT * FROM K_KOHO_DETAIL
      WHERE ku_cd = :kucd7 and NUMBER = '7' and individual_key = :indkey7) KD7,
      (SELECT * FROM K_KOHO_DETAIL
      WHERE ku_cd = :kucd8 and NUMBER = '8' and individual_key = :indkey8) KD8
      WHERE KD.ku_cd = KD2.ku_cd
      and KD.ku_cd = KD3.ku_cd
      and KD.ku_cd = KD4.ku_cd
      and KD.ku_cd = KD5.ku_cd
      and KD.ku_cd = KD6.ku_cd
      and KD.ku_cd = KD7.ku_cd
      and KD.ku_cd = KD8.ku_cd
      and KD.ku_cd = :kucd
      and KD.NUMBER = '1'
      and KD.individual_key = :indkey
    SQL;

    $stmt = $this->dbsenkyo->prepare($sql);
    $stmt->execute([
      ':kucd' => $values['kucd'],
      ':indkey' => $values['indkey'],
      ':kucd2' => $values['kucd'],
      ':indkey2' => $values['indkey'],
      ':kucd3' => $values['kucd'],
      ':indkey3' => $values['indkey'],
      ':kucd4' => $values['kucd'],
      ':indkey4' => $values['indkey'],
      ':kucd5' => $values['kucd'],
      ':indkey5' => $values['indkey'],
      ':kucd6' => $values['kucd'],
      ':indkey6' => $values['indkey'],
      ':kucd7' => $values['kucd'],
      ':indkey7' => $values['indkey'],
      ':kucd8' => $values['kucd'],
      ':indkey8' => $values['indkey'],
    ]);
    //$stmt->execute();
    $stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
    return $stmt->fetch();
  }

  /* Z_KOHO_DETAL */
  public function getZKohoDetail($values) {

    $sql = <<<SQL
      SELECT 
      KD.ku_cd as ku_cd1, 
      KD.z_koho_name as z_koho_name1, 
      KD.z_koho_hyo as z_koho_hyo1, 
      KD.z_koho_shiji as z_koho_shiji1, 
      KD.z_mutohyo_check as z_mutohyo_check1, 
      KD.z_number as z_number1, 
      KD.z_koho_kisu as z_koho_kisu1, 
      KD.z_koho_nenrei as z_koho_nenrei1, 
      KD.z_koho_taido as z_koho_taido1,
      KD2.ku_cd as ku_cd2, 
      KD2.z_koho_name as z_koho_name2, 
      KD2.z_koho_hyo as z_koho_hyo2, 
      KD2.z_koho_shiji as z_koho_shiji2, 
      KD2.z_mutohyo_check as z_mutohyo_check2, 
      KD2.z_number as z_number2, 
      KD2.z_koho_kisu as z_koho_kisu2, 
      KD2.z_koho_nenrei as z_koho_nenrei2, 
      KD2.z_koho_taido as z_koho_taido2,
      KD3.ku_cd as ku_cd2, 
      KD3.z_koho_name as z_koho_name3, 
      KD3.z_koho_hyo as z_koho_hyo3, 
      KD3.z_koho_shiji as z_koho_shiji3, 
      KD3.z_mutohyo_check as z_mutohyo_check3, 
      KD3.z_number as z_number3, 
      KD3.z_koho_kisu as z_koho_kisu3, 
      KD3.z_koho_nenrei as z_koho_nenrei3, 
      KD3.z_koho_taido as z_koho_taido3,
      KD4.ku_cd as ku_cd4, 
      KD4.z_koho_name as z_koho_name4, 
      KD4.z_koho_hyo as z_koho_hyo4, 
      KD4.z_koho_shiji as z_koho_shiji4, 
      KD4.z_mutohyo_check as z_mutohyo_check4, 
      KD4.z_number as z_number4, 
      KD4.z_koho_kisu as z_koho_kisu4, 
      KD4.z_koho_nenrei as z_koho_nenrei4, 
      KD4.z_koho_taido as z_koho_taido4,
      KD5.ku_cd as ku_cd5, 
      KD5.z_koho_name as z_koho_name5, 
      KD5.z_koho_hyo as z_koho_hyo5, 
      KD5.z_koho_shiji as z_koho_shiji5, 
      KD5.z_mutohyo_check as z_mutohyo_check5, 
      KD5.z_number as z_number5, 
      KD5.z_koho_kisu as z_koho_kisu5, 
      KD5.z_koho_nenrei as z_koho_nenrei5, 
      KD5.z_koho_taido as z_koho_taido5
      FROM Z_KOHO_DETAIL KD,
      (SELECT * FROM Z_KOHO_DETAIL
      WHERE ku_cd = :kucd2 and Z_NUMBER = '2' and individual_key = :indkey2) KD2,
      (SELECT * FROM Z_KOHO_DETAIL
      WHERE ku_cd = :kucd3 and Z_NUMBER = '3' and individual_key = :indkey3) KD3,
      (SELECT * FROM Z_KOHO_DETAIL
      WHERE ku_cd = :kucd4 and Z_NUMBER = '4' and individual_key = :indkey4) KD4,
      (SELECT * FROM Z_KOHO_DETAIL
      WHERE ku_cd = :kucd5 and Z_NUMBER = '5' and individual_key = :indkey5) KD5
      WHERE KD.ku_cd = KD2.ku_cd
      and KD.ku_cd = KD3.ku_cd
      and KD.ku_cd = KD4.ku_cd
      and KD.ku_cd = KD5.ku_cd
      and KD.ku_cd = :kucd
      and KD.Z_NUMBER = '1'
      and KD.individual_key = :indkey
    SQL;

    $stmt = $this->dbsenkyo->prepare($sql);
    $stmt->execute([
      ':kucd' => $values['kucd'],
      ':indkey' => $values['indkey'],
      ':kucd2' => $values['kucd'],
      ':indkey2' => $values['indkey'],
      ':kucd3' => $values['kucd'],
      ':indkey3' => $values['indkey'],
      ':kucd4' => $values['kucd'],
      ':indkey4' => $values['indkey'],
      ':kucd5' => $values['kucd'],
      ':indkey5' => $values['indkey'],
    ]);
    //$stmt->execute();
    $stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
    return $stmt->fetch();
  }

}