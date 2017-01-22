<?php

class Event {
  public $name;
  public $place;
  public $category;
  public $language;
  public $description;
  public $organizer;
  //public $finished;
  public $datetime;
  public $languagelevel;
  public $phonenumber;
  public $message = "None";


  public function __construct($name, $place, $category, $language, $description, $organizer, $datetime, $languagelevel, $phonenumber)
  {
    $this->name = $name;
    $this->place = $place;
    $this->category = $category;
    $this->language = $language;
    $this->description = $description;
    $this->organizer = $organizer;
    //$this->$finished = isset($finished);
    $this->datetime = $datetime;
    $this->languagelevel = $languagelevel;
    $this->phonenumber = $phonenumber;
  }

  private function check_compliance() {
    $text_fields = array($this->name, $this->category, $this->language, $this->organizer, $this->languagelevel);
    foreach($text_fields as $value) {
      if(!preg_match("/^[a-zA-Z0-9éèàêç'+()\- ]+$/", $value)) {
        $this->message = "notcompliant_fields";
      }
    }
    //var_dump($this->message);
  }

  //private function check_lengths($datas = array()) {
  private function check_lengths() {
    if((strlen($this->name) < 6) OR (strlen($this->name > 25))) {
      $this->message = "invalid_eventname";
    } elseif ((strlen($this->place) < 6) OR (strlen($this->place > 25))) {
      $this->message = "invalid_eventplace";
    } elseif ((strlen($this->description) < 15) OR (strlen($this->description > 255))) {
      $this->message = "invalid_eventdesc";
    } elseif (!strlen((string)$this->phonenumber) == 10) {
      $this->message = "invalid_eventphone";
    } else {
      $this->message = "Success";
    }
      // } elseif (strlen(str($this->phonenumber)) > 10) {
      //   $this->message = "invalid_phonenumber";
      // }
    var_dump($this->message);

  }

  public function validate()
  {
    //var_dump(get_object_vars($this));
    foreach(get_object_vars($this) as $value) {
      if(empty($value)) {
        $this->message = "empty_fields";
      }
    }

    while($this->message === "None") {
      $this->check_compliance();
      $this->check_lengths();
      //To check possible values of select postevent.
      //$this->check_values();
    }
  }
}

?>
