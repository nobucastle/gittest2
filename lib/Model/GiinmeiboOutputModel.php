<?php

namespace SenkyoDBApp\Model;

class GiinmeiboOutputModel extends \SenkyoDBApp\Model {

  /* 議員名簿 */
  public function getGiinmeibo($values) {

    if ($values['ken_cd'] === "48") {
      //衆議院
      $sql = <<<SQL
        select ke.ken_cd AS DATA00,ke.ken_nm AS DATA0,ku.gikai_nm AS DATA1,ku.ku_nm AS DATA2,
        g.giin_cd AS DATA3,g.name_kana AS DATA4,g.name_kanji AS DATA5,g.suisen_flg AS DATA6,g.seibetu_flg AS DATA7,
        left(g.yubin_no,3) AS DATA8,right(g.yubin_no,4) AS DATA9,g.jyusyo1 AS DATA10,g.jyusyo2 AS DATA11,g.yaku_gikai_data AS DATA12,
        g.yaku_tou1_data AS DATA15,g.yaku_tou2_data AS DATA16,g.yaku_tou3_data AS DATA17,
        g.gensin_cnt AS DATA18,g.seinen_YMD AS DATA19,
        g.ninki_ymd AS DATA20,g.koukai_email AS DATA21,
        g.jitaku_tel AS DATA22,g.gikai_tel AS DATA23,g.jitaku_fax AS DATA24,g.gikai_fax AS DATA25,
        g.keitai_tel AS DATA26
        from infsenkyo.new_giin_mst g,ku_mst ku,infsenkyo.ken_mst ke
        where g.ku_cd = ku.ku_cd
        and ke.ken_cd = ku.ken_cd and g.gensin_flg < 5
        and ku.gikai_nm='衆議院'
        and ke.ken_cd <> :ken_cd
        order by g.giin_cd
      SQL;
    } else if ($values['ken_cd'] === "49") {
      //参議院
      $sql = <<<SQL
        select ke.ken_cd AS DATA00,ke.ken_nm AS DATA0,ku.gikai_nm AS DATA1,ku.ku_nm AS DATA2,
        g.giin_cd AS DATA3,g.name_kana AS DATA4,g.name_kanji AS DATA5,g.suisen_flg AS DATA6,g.seibetu_flg AS DATA7,
        left(g.yubin_no,3) AS DATA8,right(g.yubin_no,4) AS DATA9,g.jyusyo1 AS DATA10,g.jyusyo2 AS DATA11,
        g.yaku_gikai_data AS DATA12,
        g.yaku_tou1_data AS DATA15,g.yaku_tou2_data AS DATA16,g.yaku_tou3_data AS DATA17,
        g.gensin_cnt AS DATA18,g.seinen_YMD AS DATA19,
        g.ninki_ymd AS DATA20,g.koukai_email AS DATA21,
        g.jitaku_tel AS DATA22,g.gikai_tel AS DATA23,g.jitaku_fax AS DATA24,g.gikai_fax AS DATA25,
        g.keitai_tel AS DATA26
        from infsenkyo.new_giin_mst g,ku_mst ku,infsenkyo.ken_mst ke
        where g.ku_cd = ku.ku_cd
        and ke.ken_cd = ku.ken_cd and g.gensin_flg<5
        and ku.gikai_nm='参議院'
        and ke.ken_cd <> :ken_cd
        order by g.giin_cd
      SQL;
    } else if ($values['ken_cd'] === "50") {
      //都議会
      $sql = <<<SQL
        select ke.ken_cd AS DATA00,ke.ken_nm AS DATA0,ku.gikai_nm AS DATA1,ku.ku_nm AS DATA2,
        g.giin_cd AS DATA3,g.name_kana AS DATA4,g.name_kanji AS DATA5,g.suisen_flg AS DATA6,g.seibetu_flg AS DATA7,
        left(g.yubin_no,3) AS DATA8,right(g.yubin_no,4) AS DATA9,g.jyusyo1 AS DATA10,g.jyusyo2 AS DATA11,
        g.yaku_gikai_data AS DATA12,
        g.yaku_ken1_data AS DATA15,g.yaku_ken2_data AS DATA16,g.yaku_ken3_data AS DATA17,
        g.gensin_cnt AS DATA18,g.seinen_YMD AS DATA19,
        g.ninki_ymd AS DATA20,g.koukai_email AS DATA21,
        g.jitaku_tel AS DATA22,ku.gikai_tel AS DATA23,g.jitaku_fax AS DATA24,ku.gikai_fax AS DATA25,
        g.keitai_tel AS DATA26
        from infsenkyo.new_giin_mst g,ku_mst ku,infsenkyo.ken_mst ke
        where g.ku_cd = ku.ku_cd
        and ke.ken_cd = ku.ken_cd and g.gensin_flg<5
        and ke.ken_cd = '13'
        and right(g.giin_cd,6) > '029999'
        and right(g.giin_cd,6) < '099999'
        and ke.ken_cd <> :ken_cd
        order by g.giin_cd
      SQL;
    } else if ($values['ken_cd'] === "51") {
      //全国都道府県会
      $sql = <<<SQL
        SELECT ke.KEN_CD AS DATA00, ke.KEN_NM AS DATA0, ku.GIKAI_NM AS DATA1,ku.KU_NM AS DATA2, g.giin_cd AS DATA3, g.name_kana AS DATA4,
        g.name_kanji AS DATA5, g.suisen_flg AS DATA6, g.seibetu_flg AS DATA7,LEFT(g.yubin_no, 3) AS DATA8, RIGHT(g.yubin_no, 4) AS DATA9,
        g.jyusyo1 AS DATA10, g.jyusyo2 AS DATA11, g.yaku_gikai_data AS DATA12,g.yaku_ken1_data AS DATA15, g.yaku_ken2_data AS DATA16,
        g.yaku_ken3_data AS DATA17, g.gensin_cnt AS DATA18,g.seinen_ymd AS DATA19, g.ninki_ymd AS DATA20, g.koukai_email AS DATA21,
        g.jitaku_tel AS DATA22, ku.gikai_tel AS DATA23, g.jitaku_fax AS DATA24,ku.gikai_fax AS DATA25, g.keitai_tel AS DATA26
        FROM infsenkyo.NEW_GIIN_MST g INNER JOIN
        infsenkyo.KU_MST ku ON g.ku_cd = ku.KU_CD INNER JOIN
        infsenkyo.KEN_MST ke ON ku.KEN_CD = ke.KEN_CD
        WHERE (g.gensin_flg < 5) AND (RIGHT(g.giin_cd, 6) > '030000') AND (RIGHT(g.giin_cd,6) < '039999') AND (ke.KEN_CD <> 13)
        AND ke.ken_cd <> :ken_cd
        ORDER BY ku.ku_cd,g.giin_cd
      SQL;
    } else if ($values['ken_cd'] === "52") {
      //全国政令市
      $sql = <<<SQL
        SELECT ke.KEN_CD AS DATA00, ke.KEN_NM AS DATA0, ku.GIKAI_NM AS DATA1,ku.KU_NM AS DATA2, g.giin_cd AS DATA3, g.name_kana AS DATA4,
        g.name_kanji AS DATA5, g.suisen_flg AS DATA6, g.seibetu_flg AS DATA7,LEFT(g.yubin_no, 3) AS DATA8, RIGHT(g.yubin_no, 4) AS DATA9,
        g.jyusyo1 AS DATA10, g.jyusyo2 AS DATA11, g.yaku_gikai_data AS DATA12,g.yaku_ken1_data AS DATA15, g.yaku_ken2_data AS DATA16,
        g.yaku_ken3_data AS DATA17, g.gensin_cnt AS DATA18,g.seinen_ymd AS DATA19, g.ninki_ymd AS DATA20, g.koukai_email AS DATA21,
        g.jitaku_tel AS DATA22, ku.gikai_tel AS DATA23, g.jitaku_fax AS DATA24,ku.gikai_fax AS DATA25, g.keitai_tel AS DATA26
        FROM infsenkyo.NEW_GIIN_MST g INNER JOIN
        infsenkyo.KU_MST ku ON g.ku_cd = ku.KU_CD INNER JOIN
        infsenkyo.KEN_MST ke ON ku.KEN_CD = ke.KEN_CD
        WHERE (g.gensin_flg < 5) AND (RIGHT(g.giin_cd, 6) > '100000') AND (RIGHT(g.giin_cd,6) < '199999') AND (ke.KEN_CD <> 13)
        AND ke.ken_cd <> :ken_cd
        ORDER BY ku.ku_cd,g.giin_cd
      SQL;
    } else if ($values['ken_cd'] === "53") {
      //東京特別区
      $sql = <<<SQL
        SELECT ke.KEN_CD AS DATA00, ke.KEN_NM AS DATA0, ku.GIKAI_NM AS DATA1,ku.KU_NM AS DATA2, g.giin_cd AS DATA3, g.name_kana AS DATA4,
        g.name_kanji AS DATA5, g.suisen_flg AS DATA6, g.seibetu_flg AS DATA7,LEFT(g.yubin_no, 3) AS DATA8, RIGHT(g.yubin_no, 4) AS DATA9,
        g.jyusyo1 AS DATA10, g.jyusyo2 AS DATA11, g.yaku_gikai_data AS DATA12,g.yaku_ken1_data AS DATA15, g.yaku_ken2_data AS DATA16,
        g.yaku_ken3_data AS DATA17, g.gensin_cnt AS DATA18,g.seinen_ymd AS DATA19, g.ninki_ymd AS DATA20, g.koukai_email AS DATA21,
        g.jitaku_tel AS DATA22, ku.gikai_tel AS DATA23, g.jitaku_fax AS DATA24,ku.gikai_fax AS DATA25, g.keitai_tel AS DATA26
        FROM infsenkyo.NEW_GIIN_MST g INNER JOIN
        infsenkyo.KU_MST ku ON g.ku_cd = ku.KU_CD INNER JOIN
        infsenkyo.KEN_MST ke ON ku.KEN_CD = ke.KEN_CD
        WHERE (g.gensin_flg < 5) AND (RIGHT(g.giin_cd, 6) > '100000') AND (RIGHT(g.giin_cd,6) < '199999') AND (ke.KEN_CD = 13)
        AND ke.ken_cd <> :ken_cd
        ORDER BY g.giin_cd
      SQL;
    } else {
      //各都道府県
      $sql = <<<SQL
        select ke.ken_cd AS DATA00,ke.ken_nm AS DATA0,ku.gikai_nm AS DATA1,ku.ku_nm AS DATA2,
        g.giin_cd AS DATA3,g.name_kana AS DATA4,g.name_kanji AS DATA5,g.suisen_flg AS DATA6,g.seibetu_flg AS DATA7,
        left(g.yubin_no,3) AS DATA8,right(g.yubin_no,4) AS DATA9,g.jyusyo1 AS DATA10,g.jyusyo2 AS DATA11,
        g.yaku_gikai_data AS DATA12,
        g.yaku_ken1_data AS DATA15,g.yaku_ken2_data AS DATA16,g.yaku_ken3_data AS DATA17,
        g.gensin_cnt AS DATA18,g.seinen_YMD AS DATA19,
        g.ninki_ymd AS DATA20,g.koukai_email AS DATA21,
        g.jitaku_tel AS DATA22,ku.gikai_tel AS DATA23,g.jitaku_fax AS DATA24,ku.gikai_fax AS DATA25,
        g.keitai_tel AS DATA26
        from infsenkyo.new_giin_mst g,ku_mst ku,infsenkyo.ken_mst ke
        where g.ku_cd = ku.ku_cd
        and ke.ken_cd = ku.ken_cd and g.gensin_flg<5
        and ke.ken_cd = :ken_cd
        and right(g.giin_cd,6) > '029999'
        order by ku.ku_cd,g.giin_cd
      SQL;
    }

    $stmt = $this->dbsenkyo->prepare($sql);
    $stmt->execute([':ken_cd' => $values['ken_cd']]);
    $stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
    return $stmt->fetchAll();
  }

}