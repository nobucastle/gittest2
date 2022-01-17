<?php

namespace SenkyoDBApp\Controller;

class ProjectTeamHikakuOutput extends \SenkyoDBApp\Controller {

  public function run($giinId) {

    $ProjectTeamHikakuOutputModel = new \SenkyoDBApp\Model\ProjectTeamHikakuOutputModel();

    //公明党増加率
    $this->setValues('giins', $ProjectTeamHikakuOutputModel->getGiinsInfo([
		'giin_id' => $giinId,
	]));

  }
	
  public function run2($giinRow) {

    $ProjectTeamHikakuOutputModel = new \SenkyoDBApp\Model\ProjectTeamHikakuOutputModel();

    //公明党増加率
    $this->setValues('giins2', $ProjectTeamHikakuOutputModel->getGiinsInfo2([
		'giin_id' => $giinRow,
	]));

  }
	

  public function run3($giinRowNew,$giinRowNew2) {

    $ProjectTeamHikakuOutputModel = new \SenkyoDBApp\Model\ProjectTeamHikakuOutputModel();

    //公明党増加率
    $this->setValues('giins3', $ProjectTeamHikakuOutputModel->getGiinsInfo3([
		'giin_id' => $giinRowNew,
		'giin_id2' => $giinRowNew2,
	]));

  }
	
  public function run4($giinRow) {

    $ProjectTeamHikakuOutputModel = new \SenkyoDBApp\Model\ProjectTeamHikakuOutputModel();

    //公明党増加率
    $this->setValues('giins4', $ProjectTeamHikakuOutputModel->getGiinsInfo4([
		'giin_id' => $giinRow,
	]));

  }
	
	
}
