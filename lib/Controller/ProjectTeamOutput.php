<?php

namespace SenkyoDBApp\Controller;

class ProjectTeamOutput extends \SenkyoDBApp\Controller {

  public function run($giinId) {

    $ProjectTeamOutputModel = new \SenkyoDBApp\Model\ProjectTeamOutputModel();

    //公明党増加率
    $this->setValues('giins', $ProjectTeamOutputModel->getGiinsInfo([
		'giin_id' => $giinId,
	]));
					 
    //$this->setValues('giins', $ProjectTeamOutputModel->getGiinsInfo());

  }
	
  public function run2($giinRow) {

    $ProjectTeamOutputModel = new \SenkyoDBApp\Model\ProjectTeamOutputModel();

    //公明党増加率
    $this->setValues('giins2', $ProjectTeamOutputModel->getGiinsInfo2([
		'giin_id' => $giinRow,
	]));
					 
    //$this->setValues('giins', $ProjectTeamOutputModel->getGiinsInfo());

  }
	
	
}
