<?php

require_once('lib/sessions.php');
require_once('models/dbconnect.php');
require_once('models/profil_functions.php');

$query = "gozpeak";
$pseudo = $_GET['profil'];
$infos = profil_info ($DB, $pseudo);


//COUNT NUMBER OF EVENTS POSTED BY USER //
$nb_events = count_events ($DB, $pseudo);


$logged = check_logged();

if ($logged == 0) {
        //include_once('Views/headband-logged.php');
	header('location: index.php?page=connexion');
} else {
        include_once('Views/headband-logged.php');
}


if ($infos['premium'] == 0) {
	$infos['premium'] == 'Non';
} else {
	$infos['premium'] == 'Oui';
}

include_once('Views/head.php');

include_once('Views/profil.php');
include_once('Views/footer.php');

?>


