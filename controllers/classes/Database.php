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

    }
    return $this->pdo;
  }

	public function query($statement) {
    $req = $this->getPDO()->query($statement);
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
  }

  public function count($statement) {
    $req = $this->getPDO()->query($statement);
    $nb_rows = $req->rowCount();
    return $nb_rows;
  }

  public function retrieveMember($username = ''){
    $member = $this->count("SELECT COUNT(pseudo) as pseudonyme FROM members where pseudo = '$username'");

    if($member < 1) {
      throw new LogicException($message[$_SESSION['language']]['postevent']['organizernotfound']);
    }
  }

  public function check_Ideaname($eventname){
    $eventname = $this->count("SELECT COUNT(ideaname) as ideanames from ideas where ideaname = '$eventname'");

    if($eventname > 0){
      throw new LogicException($message[$_SESSION['language']]['postevent']['eventexists']);
    }
  }

  public function registerIdea($eventdata){
    $instance = $this->getPDO();
    $req = $instance->prepare("INSERT INTO ideas (ideaname, ideaplace, ideatype, language, ideadesc, organizer, ideadatetime, level_language, ideaphone) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $req->execute($eventdata);
  }
}

?>
