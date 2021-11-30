<?php

namespace SenkyoDBApp\Controller;

class KubichoOutput extends \SenkyoDBApp\Controller {

  public function run($kuCd, $indKey) {

    $kubichoOutputModel = new \SenkyoDBApp\Model\KubichoOutputModel();

    //KUBICHO_DETAIL
    $this->setValues('kubicho', $kubichoOutputModel->getKubicho([
      'kucd' => $kuCd,
      'indkey' => $indKey
    ]));

    //K_KOHO_DETAL
    $this->setValues('koho', $kubichoOutputModel->getKohoDetail([
      'kucd' => $kuCd,
      'indkey' => $indKey
    ]));

    //Z_KOHO_DETAL
    $this->setValues('z_koho', $kubichoOutputModel->getZKohoDetail([
      'kucd' => $kuCd,
      'indkey' => $indKey
    ]));

  }
}
