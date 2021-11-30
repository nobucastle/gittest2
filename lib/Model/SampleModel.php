<?php

namespace SenkyoDBApp\Model;

class TohabetsuOutputModel extends \SenkyoDBApp\Model {

  public function getGiinInfos($values) {

    $sql = <<<SQL
      select g.giin_id, g.ku_cd, g.giin_name, g.katagaki_cd, g.katagaki_detail, katagaki_detail2, suisen_cd, tt.tanto_name, tt.tanto_type, tt.chiiki_cd
      from giins g
      left outer join tantos tt
      on (g.giin_id = tt.giin_id and g.ken_cd = tt.ken_cd and g.senkyo_cd = tt.senkyo_cd)
      where g.giin_id = :giin_id and g.ken_cd = :ken_cd and g.senkyo_cd = :senkyo_cd and g.del_flg = 0
      order by tt.order_no asc
    SQL;

    $stmt = $this->db->prepare($sql);

    $stmt->execute([
      ':giin_id' => $values['giinid'],
      ':ken_cd' => $values['kencd'],
      ':senkyo_cd' => $values['senkyocd'],
    ]);

    $stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
    return $stmt->fetchAll();

  }

}