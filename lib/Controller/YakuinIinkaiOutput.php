<?php

namespace SenkyoDBApp\Controller;

class YakuinIinkaiOutput extends \SenkyoDBApp\Controller {

  public function run($giinId) {

    $YakuinIinkaiOutputModel = new \SenkyoDBApp\Model\YakuinIinkaiOutputModel();

    //公明党増加率
    $this->setValues('giins', $YakuinIinkaiOutputModel->getGiinsInfo([
		'giin_id' => $giinId,
	]));
					 
    //$this->setValues('giins', $YakuinIinkaiOutputModel->getGiinsInfo());

  }
	
  public function run2($giinRow) {

    $YakuinIinkaiOutputModel = new \SenkyoDBApp\Model\YakuinIinkaiOutputModel();

    //公明党増加率
    $this->setValues('giins2', $YakuinIinkaiOutputModel->getGiinsInfo2([
		'giin_id' => $giinRow,
	]));
					 
    //$this->setValues('giins', $YakuinIinkaiOutputModel->getGiinsInfo());

  }
	
	
}
