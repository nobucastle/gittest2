<?php

namespace SenkyoDBApp\Model;

class GiinCardOutputModel extends \SenkyoDBApp\Model {

  /* 議員カード */
  public function getGiincard($values) {

    $sql = <<<SQL
      SELECT KN.KEN_CD AS DKN1,KN.KEN_NM AS DKN2,K.KU_CD AS DK1,K.SYU_CD AS DK2,K.KU_NM AS DK3,K.GIKAI_TEL AS DK4,K.GIKAI_FAX AS DK5,K.NINKI_YMD AS DK6,K.TOUSEN_YMD AS DK7,K.GIKAI_NM AS DK11,G.giin_cd AS D1,G.ku_cd AS D2,G.name_kana AS D3,G.name_kanji AS D4,G.seibetu_flg AS D5,G.gensin_flg AS D6,G.gensin_cnt AS D7,
      G.seinen_ymd AS D8,G.yubin_no AS D9,G.jyusyo1 AS D10,G.jyusyo2 AS D11,G.honseki_yubin AS D12,G.honseki AS D13,G.syussei AS D14,G.jitaku_tel AS D15,G.keitai_tel AS D16,G.jitaku_fax AS D17,G.koukai_email AS D18,G.gikai_tel AS D19,G.gikai_fax AS D226,G.jimusyo_tel AS D20,G.url_1 AS D21,G.url_2 AS D22,G.sosibu AS D23,G.sibu AS D24,G.yaku_tou1_data AS D25,G.yaku_tou1_wa AS D26,
      G.yaku_tou1_ym AS D27,G.yaku_tou2_data AS D28,G.yaku_tou2_wa AS D29,G.yaku_tou2_ym AS D30,G.yaku_tou3_data AS D220,G.yaku_tou3_wa AS D221,G.yaku_tou3_ym AS D222,G.yaku_ken1_data AS D31,G.yaku_ken1_wa AS D32,G.yaku_ken1_ym AS D33,G.yaku_ken2_data AS D34,G.yaku_ken2_wa AS D35,G.yaku_ken2_ym AS D36,G.yaku_ken3_data AS D223,G.yaku_ken3_wa AS D224,G.yaku_ken3_ym AS D225,G.yaku_sosibu_data AS D37,G.yaku_sosibu_wa AS D38,
      G.yaku_sosibu_ym AS D39,G.yaku_sibu_data AS D40,G.yaku_sibu_wa AS D41,G.yaku_sibu_ym AS D42,G.yaku_gikai_data AS D43,G.yaku_gikai_wa AS D44,G.yaku_gikai_ym AS D45,G.yaku_san_data AS D46,G.yaku_san_wa AS D47,G.yaku_san_ym AS D48,G.yaku_gai_data AS D49,G.yaku_gai_wa AS D50,G.yaku_gai_ym AS D51,G.giin_reki1_wa AS D52,G.giin_reki1_ym AS D53,G.giin_reki1_data AS D54,G.giin_reki2_wa AS D55,G.giin_reki2_ym AS D56,
      G.giin_reki2_data AS D57,G.giin_reki3_wa AS D58,G.giin_reki3_ym AS D59,G.giin_reki3_data AS D60,G.giin_reki4_wa AS D61,G.giin_reki4_ym AS D62,G.giin_reki4_data AS D63,G.giin_reki5_wa AS D64,G.giin_reki5_ym AS D65,G.giin_reki5_data AS D66,G.giin_reki6_wa AS D67,G.giin_reki6_ym AS D68,G.giin_reki6_data AS D69,G.giin_reki7_wa AS D70,G.giin_reki7_ym AS D71,G.giin_reki7_data AS D72,G.gakureki_syo_wa AS D73,
      G.gakureki_syo_ym AS D74,G.gakureki_syo_data AS D75,G.gakureki_cyu_wa AS D76,G.gakureki_cyu_ym AS D77,G.gakureki_cyu_data AS D78,G.gakureki_ko_wa AS D79,G.gakureki_ko_ym AS D80,G.gakureki_ko_data AS D81,G.gakureki_ta1_wa AS D82,G.gakureki_ta1_ym AS D83,G.gakureki_ta1_data AS D84,G.gakureki_ta2_wa AS D85,G.gakureki_ta2_ym AS D86,G.gakureki_ta2_data AS D87,G.gakureki_ta3_wa AS D88,G.gakureki_ta3_ym AS D89,
      G.gakureki_ta3_data AS D90,G.gakureki_saisyu_wa AS D91,G.gakureki_saisyu_ym AS D92,G.gakureki_saisyu_data AS D93,G.kinmusaki AS D94,G.kinmusaki_yubin AS D95,G.kinmusaki_jyusyo AS D96,G.kinmusaki_tel AS D97,G.syokusyu AS D98,G.syokuseki AS D99,G.kinzoku_ym AS D100,G.syokureki1_wa AS D101,G.syokureki1_ym AS D102,G.syokureki1_data AS D103,G.syokureki2_wa AS D104,G.syokureki2_ym AS D105,G.syokureki2_data AS D106,G.syokureki3_wa AS D107,G.syokureki3_ym AS D108,
      G.syokureki3_data AS D109,G.syokureki4_wa AS D110,G.syokureki4_ym AS D111,G.syokureki4_data AS D112,G.syokureki5_wa AS D113,G.syokureki5_ym AS D114,G.syokureki5_data AS D115,G.syokureki6_wa AS D116,G.syokureki6_ym AS D117,G.syokureki6_data AS D118,G.syokureki7_wa AS D119,G.syokureki7_ym AS D120,G.syokureki7_data AS D121,G.syokureki8_wa AS D122,G.syokureki8_ym AS D123,G.syokureki8_data AS D124,G.menkyo AS D125,
      G.sikaku AS D126,G.tokugi AS D127,G.jikayosya AS D128,G.koninji_s_yaku AS D129,G.tosengo_s_yaku AS D130,G.nyukai_wa AS D131,G.nyukai_ymd AS D132,G.kyougaku_data AS D133,G.kyougaku_wa AS D134,G.kyougaku_ym AS D135,G.kazoku1_simei AS D136,G.kazoku1_zokugara AS D137,G.kazoku1_wa AS D138,G.kazoku1_seinen_ymd AS D139,G.kazoku1_nyukai AS D140,G.kazoku1_s_yaku AS D141,G.kazoku1_gakureki AS D142,
      G.kazoku1_syokugyo AS D143,G.kazoku1_doubetu AS D144,G.kazoku2_simei AS D145,G.kazoku2_zokugara AS D146,G.kazoku2_wa AS D147,G.kazoku2_seinen_ymd AS D148,G.kazoku2_nyukai AS D149,G.kazoku2_s_yaku AS D150,G.kazoku2_gakureki AS D151,G.kazoku2_syokugyo AS D152,G.kazoku2_doubetu AS D153,G.kazoku3_simei AS D154,G.kazoku3_zokugara AS D155,G.kazoku3_wa AS D156,G.kazoku3_seinen_ymd AS D157,G.kazoku3_nyukai AS D158,
      G.kazoku3_s_yaku AS D159,G.kazoku3_gakureki AS D160,G.kazoku3_syokugyo AS D161,G.kazoku3_doubetu AS D162,G.kazoku4_simei AS D163,G.kazoku4_zokugara AS D164,G.kazoku4_wa AS D165,G.kazoku4_seinen_ymd AS D166,G.kazoku4_nyukai AS D167,G.kazoku4_s_yaku AS D168,G.kazoku4_gakureki AS D169,G.kazoku4_syokugyo AS D170,G.kazoku4_doubetu AS D171,G.kazoku5_simei AS D172,G.kazoku5_zokugara AS D173,G.kazoku5_wa AS D174,
      G.kazoku5_seinen_ymd AS D175,G.kazoku5_nyukai AS D176,G.kazoku5_s_yaku AS D177,G.kazoku5_gakureki AS D178,G.kazoku5_syokugyo AS D179,G.kazoku5_doubetu AS D180,G.kazoku6_simei AS D181,G.kazoku6_zokugara AS D182,G.kazoku6_wa AS D183,G.kazoku6_seinen_ymd AS D184,G.kazoku6_nyukai AS D185,G.kazoku6_s_yaku AS D186,G.kazoku6_gakureki AS D187,G.kazoku6_syokugyo AS D188,G.kazoku6_doubetu AS D189,G.kazoku7_simei AS D190,
      G.kazoku7_zokugara AS D191,G.kazoku7_wa AS D192,G.kazoku7_seinen_ymd AS D193,G.kazoku7_nyukai AS D194,G.kazoku7_s_yaku AS D195,G.kazoku7_gakureki AS D196,G.kazoku7_syokugyo AS D197,G.kazoku7_doubetu AS D198,G.kazoku8_simei AS D199,G.kazoku8_zokugara AS D200,G.kazoku8_wa AS D201,G.kazoku8_seinen_ymd AS D202,G.kazoku8_nyukai AS D203,G.kazoku8_s_yaku AS D204,G.kazoku8_gakureki AS D205,G.kazoku8_syokugyo AS D206,
      G.kazoku8_doubetu AS D207,G.suisen_flg AS D208,G.ninki_ymd AS D209,G.tousen_ymd AS D210,G.riyu_cd AS D211,G.gen_riyu AS D212,G.intai_ymd AS D213,G.egin_flg AS D214,G.sinki_ymd AS D215,G.sinki_user_cd AS D216,G.syusei_ymd AS D217,G.user_cd AS D218 
      FROM infsenkyo.KEN_MST KN 
      RIGHT OUTER JOIN infsenkyo.KU_MST K 
      ON KN.KEN_CD=K.KEN_CD 
      RIGHT OUTER JOIN infsenkyo.NEW_GIIN_MST G 
      ON K.KU_CD=LEFT(G.ku_cd,7)
      WHERE (G.giin_cd = :giin_cd)
      ORDER BY G.giin_cd
    SQL;

    $stmt = $this->dbsenkyo->prepare($sql);
    $stmt->execute([':giin_cd' => $values['giin_cd']]);
    $stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
    return $stmt->fetch();
  }

}