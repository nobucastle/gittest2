<?php

namespace SenkyoDBApp\Controller;

class RirekiCardOutput extends \SenkyoDBApp\Controller {

  public function run($giinId) {

    $RirekiCardOutputModel = new \SenkyoDBApp\Model\RirekiCardOutputModel();

    //公明党増加率
    $this->setValues('giins', $RirekiCardOutputModel->getGiinsInfo([
		'giin_id' => $giinId,
	]));

  }
}
