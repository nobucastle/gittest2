<?php

namespace SenkyoDBApp\Controller;

class Sample extends \SenkyoDBApp\Controller {

  public function run($giinId, $kenCd, $senkyoCd) {

    $samleModel = new \SenkyoDBApp\Model\SampleModel();

    $this->setValues('giins', $samleModel->getGiinInfos([
      'giinid' => $giinId, 
      'kencd' => $kenCd, 
      'senkyocd' => $senkyoCd
    ]));

  }
}
