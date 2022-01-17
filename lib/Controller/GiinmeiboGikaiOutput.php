<?php

namespace SenkyoDBApp\Controller;

class GiinmeiboGikaiOutput extends \SenkyoDBApp\Controller {

  public function run($ken_cd) {

    $GiinmeiboGikaiOutputModel = new \SenkyoDBApp\Model\GiinmeiboGikaiOutputModel();

    //議員名簿取得
    $this->setValues('meibos', $GiinmeiboGikaiOutputModel->getGiinmeibo([
      'ken_cd' => $ken_cd,
    ]));

  }
}
