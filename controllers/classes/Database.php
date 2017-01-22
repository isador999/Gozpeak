<?php

class Database {

  private $db_name;
  private $db_user;
  private $db_pass;
  private $db_host;
  private $pdo;

  public function __construct($db_name, $db_user = 'root', $db_pass='passwd', $db_host = 'localhost'){
    $this->db_name = $db_name;
    $this->db_user = $db_user;
    $this->db_pass = $db_pass;
    $this->db_host = $db_host;
  }

  private function getPDO() {
    if ($this->pdo === null) {
      $pdo = new PDO('mysql:host=localhost;dbname=gozpeak_dev', 'root', 'passwd');
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
      $pdo->exec("SET CHARACTER SET utf8");
      $this->pdo = $pdo;
      var_dump('PDO initialise');
    }
    return $pdo;
    var_dump('PDO called');
  }

	public function query($statement) {
    $req = $this->getPDO()->query($statement);
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
  }
}

?>
