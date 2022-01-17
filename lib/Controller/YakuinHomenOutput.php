<?php

namespace SenkyoDBApp\Controller;

class YakuinHomenOutput extends \SenkyoDBApp\Controller {

  public function run($giinId) {

    $YakuinHomenOutputModel = new \SenkyoDBApp\Model\YakuinHomenOutputModel();

    //公明党増加率
    $this->setValues('giins', $YakuinHomenOutputModel->getGiinsInfo([
		'giin_id' => $giinId,
	]));
					 
    //$this->setValues('giins', $YakuinHomenOutputModel->getGiinsInfo());

  }
	
  public function run2($giinRow) {

    $YakuinHomenOutputModel = new \SenkyoDBApp\Model\YakuinHomenOutputModel();

    //公明党増加率
    $this->setValues('giins2', $YakuinHomenOutputModel->getGiinsInfo2([
		'giin_id' => $giinRow,
	]));
					 
    //$this->setValues('giins', $YakuinHomenOutputModel->getGiinsInfo());

  }
	
	
}
