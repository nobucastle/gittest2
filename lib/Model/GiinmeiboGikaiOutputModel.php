<?php

namespace SenkyoDBApp\Model;

class GiinmeiboGikaiOutputModel extends \SenkyoDBApp\Model {

  /* 議員名簿 */
  public function getGiinmeibo($values) {

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
        from infsenkyo.new_giin_mst g,infsenkyo.ku_mst ku,infsenkyo.ken_mst ke
        where g.ku_cd = ku.ku_cd
        and ke.ken_cd = ku.ken_cd and g.gensin_flg<5
        and ku.gikai_cd = :ken_cd
        and right(g.giin_cd,6) > '029999'
        order by ku.ku_cd,g.giin_cd
      SQL;

    $stmt = $this->dbsenkyo->prepare($sql);
    $stmt->execute([':ken_cd' => $values['ken_cd']]);
    $stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
    return $stmt->fetchAll();
  }

}