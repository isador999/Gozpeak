<?php

class EventEntity {
  public $name;
  public $category;
  public $language;
  public $description;
  public $organizer;
  public $finished;
  public $dayname;
  public $daynumber
  public $monthname;
  public $hour;

  function getEvent();



}

class Event extends EventEntity {

}



class Member {
  public $pseudo;
  public $email;
  public $name;
  public $lastname;
  public $password;
  public $birthday;
  public $gender;
  public $languages;

  private $loggedIn = false;

  public function login() {
    $this->loggedIn = true;
  }



}



?>
