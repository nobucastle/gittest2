<?php

namespace SenkyoDBApp;

class Model {
  protected $dbsenkyo;

  public function __construct() {
    try {
      $this->dbsenkyo = new \PDO(PDO_DSN_SENKYO, DB_USERNAME_SENKYO, DB_PASSWORD_SENKYO);
    } catch (\PDOException $e) {
      echo $e->getMessage();
      exit;
    }
  }
}
