<?php

  // public function setName($name) {
  //   $this->name = $name;
  // }
  //
  // public function setCategory($category) {
  //   $this->category = $category;
  // }
  //
  // public function setLanguage($language) {
  //   $this->language = $language;
  // }
  //
  // public function setOrganizer($organizer) {
  //   $this->organizer = $organizer;
  // }
  //
  // public function setDescription($description) {
  //   $this->description = $description;
  // }


class Member {
  protected $pseudo;
  protected $email;
  protected $firstname;
  protected $lastname;
  protected $password;
  protected $birthdate;
  protected $gender;
  protected $languages;

  public function __construct($pseudo, $email, $password)
  {
    $this->setPseudo($pseudo);
    $this->setEmail($email);
    $this->setPassword($password);
    }

  public function getPseudo() {
    return $this->pseudo;
  }

  public function getEmail() {
    return $this->email;
  }

  public function getFirstname() {
    return $this->firstname;
  }

  public function getLastname() {
    return $this->lastname;
  }

  public function getPassword() {
    return $this->password;
  }

  public function getBirthdate() {
    return $this->birthdate;
  }

  public function getGender() {
    return $this->gender;
  }

  public function getLanguages() {
    return $this->languages;
  }

  // Function Set Mode
  public function setPseudo($pseudo) {
    $this->pseudo = $pseudo;
  }

  public function setEmail($email) {
    $this->email = $email;
  }

  public function setFirstName($firstname) {
    $this->firstname = $firstname;
  }

  public function setLastname($lastname) {
    $this->lastname = $lastname;
  }

  public function setBirthdate($birthdate) {
    $this->birthdate = $birthdate;
  }

  public function setGender($gender) {
    $this->gender = $gender;
  }

  public function setLanguages($languages) {
    $this->languages = $languages;
  }
}

?>
