<?php

namespace SenkyoDBApp\Controller;

class GiinmeiboOutput extends \SenkyoDBApp\Controller {

  public function run($ken_cd) {

    $GiinmeiboOutputModel = new \SenkyoDBApp\Model\GiinmeiboOutputModel();

    //議員名簿取得
    $this->setValues('meibos', $GiinmeiboOutputModel->getGiinmeibo([
      'ken_cd' => $ken_cd,
    ]));

  }
}
