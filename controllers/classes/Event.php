<?php

class Event {
  public $name;
  public $place;
  public $category;
  public $language;
  public $description;
  public $organizer;
  public $datetime;
  public $languagelevel;
  public $phonenumber;


  public function __construct($name, $place, $category, $language, $description, $organizer, $datetime, $languagelevel, $phonenumber)
  {
    $this->name = $name;
    $this->place = $place;
    $this->category = $category;
    $this->language = $language;
    $this->description = $description;
    $this->organizer = $organizer;
    $this->datetime = $datetime;
    $this->languagelevel = $languagelevel;
    $this->phonenumber = $phonenumber;
  }

  public function validate_fields() {
    foreach(get_object_vars($this) as $value) {
      if(empty($value)) {
        throw new LengthException();
      }
    }

    if((strlen($this->name) < 6) OR (strlen($this->name > 25))) {
      //throw new LengthException("Le nom de l'événement doit faire entre 6 et 25 caractères");
      throw new LengthException();
    } elseif ((strlen($this->place) < 6) OR (strlen($this->place > 25))) {
      //throw new LengthException("Le lieu de l'événement doit faire entre 6 et 25 caractères");
      throw new LengthException();
    } elseif ((strlen($this->description) < 15) OR (strlen($this->description > 255))) {
      //throw new LengthException("La description de l'événement doit faire entre 15 et 255 caractères");
      throw new LengthException();
    } elseif (!strlen((string)$this->phonenumber) == 10) {
      //throw new LengthException("Le numéro de téléphone doit être composé de 10 chiffres");
      throw new LengthException();
    }

    $text_fields = array($this->name, $this->category, $this->language, $this->organizer, $this->languagelevel);
    foreach($text_fields as $value) {
      if(!preg_match("/^[a-zA-Z0-9éèàêç'+()\- ]+$/", $value)) {
        throw new UnexpectedValueException();
      }
    }
  }

  public function check_values() {
    switch($this->language) {
      case "english":
      case "spanish":
      case "italian":
      case "french":
      case "others":
        break;
      default:
        throw new OutOfBoundsException();
    }

    switch($this->languagelevel) {
      case "beginner":
      case "middle":
      case "advanced":
        break;
      default:
        throw new OutOfBoundsException();
    }
  }

}

?>
