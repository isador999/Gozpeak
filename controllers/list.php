<?php

#require_once('lib/sessions.php');
require_once(CONTROLLERS.'init.php');
require_once(MODELS.'dbconnect.php');
require_once(MODELS.'list_functions.php');
#require_once(LIB.'check_login.php');
require_once(LIB.'display.php');
require_once(VIEWS.'styles.php');
#require_once(MODELS.'dbconnect.php');
#require_once(MODELS.'list_functions.php');

$query = isset($_GET['query']) ? $_GET['query'] : '';
$eventposted = isset($_GET['eventposted']) ? $_GET['eventposted'] : '';
$date = (!empty($_GET['date'])) ? $_GET['date'] : date("Y-m-d");
$language = (!empty($_GET['language'])) ? $_GET['language'] : '';

$logged = check_logged();


### Uncomment this var to see the logged header ! ###
### Commenter pour afficher le bandeau 'Connexion'  et  'Inscription'
### Decommenter pour afficher le bandeau 'Connecté'  et  'Se deconnecter'
#$logged = 1;

if ($logged == 1) {
	include_once(VIEWS.'header-logged.php');
	echo "USER LOGGED !";
} else {
	include_once(VIEWS.'header-notlogged.php');
	echo "USER unlogged !";
}



// COMMENTE CAR NECESSITE UNE CONNEXION A LA BASE //
// RETRIEVE FROM 'EVENTS' TABLE //
$events = retrieve_events_by_type ($DB, $query, $language, $date);

// RETRIEVE FROM 'IDEAS' TABLE //
$ideas = retrieve_ideas_by_type ($DB, $query, $language, $date);


if ($eventposted == 1) {
 	$message = "Votre evenement $query a bien ete enregistre, vous pouvez utiliser les fonctions de tri pour le retrouver";
} elseif (empty($events) AND empty($ideas)) {
	if($date == date("Y-m-d")) {
		$date = "aujourd'hui";
	} else {
		$date = "le ".$date;
	}
	$message = "Désole, aucun idée ou sortie $query pour pratiquer,  $date";
}else {
	$message = "";
}


#include_once('Views/list-sort.php');
include_once(VIEWS.'list-sort.php');
include_once(VIEWS.'list.php');
include_once(VIEWS.'footer.php');
include_once(VIEWS.'scripts.php');

?>


