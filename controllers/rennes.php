<?php

require_once('lib/sessions.php');
require_once('lib/display.php');
require_once('models/dbconnect.php');


if(empty($_GET['query'])) {
	$query = "gozpeak";
}

$logged = check_logged();

include_once('Views/head.php');

if ($logged == 1) {
        include_once('Views/headband-logged.php');
} else {
        include_once('Views/headband-notlogged.php');
}

if(!empty($_SESSION['profil']) && ($_SERVER['HTTP_REFERER'] == "https://gozpeak.no-ip.info/index.php?page=connexion")) {
	$message = "Content de vous revoir, ". $_SESSION['profil'];
} else {
	$message = "";
}


include_once('Views/rennes.php');
include_once('Views/footer.php');

?>
