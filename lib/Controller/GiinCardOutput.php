<?php

namespace SenkyoDBApp\Controller;

class GiinCardOutput extends \SenkyoDBApp\Controller {

  public function run($giin_cd) {

    $GiinCardOutputModel = new \SenkyoDBApp\Model\GiinCardOutputModel();

    //議員カード取得
    $this->setValues('card', $GiinCardOutputModel->getGiincard([
      'giin_cd' => $giin_cd,
    ]));

  }
}
