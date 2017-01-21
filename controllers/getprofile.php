<?php

session_start();
require_once('./language/fr.php');
require_once('./lib/sessions_init.php');

require_once('../models/dbconnect.php');
require_once('../models/profile_functions.php');


if ($_GET) {
  $pseudo = $_GET['profil'];
  $infos_profile = profile_info($DB, $pseudo);
  echo json_encode($infos_profile);
}

?>
