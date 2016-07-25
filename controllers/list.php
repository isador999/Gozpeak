<?php

#require_once('lib/sessions.php');
require_once(CONTROLLERS.'init.php');
require_once(MODELS.'dbconnect.php');
require_once(MODELS.'list_functions.php');
#require_once(LIB.'check_login.php');
require_once(LIB.'display.php');
require_once(VIEWS.'styles.php');

if(isset($_GET['query']) && !empty($_GET['query'])) {
	$_SESSION['query'] = $_GET['query'];
}

$eventposted = isset($_GET['eventposted']) ? $_GET['eventposted'] : '';
#$date = (!empty($_GET['date'])) ? $_GET['date'] : date("Y-m-d");
$language = (!empty($_GET['language'])) ? $_GET['language'] : '';

$logged = check_logged();


### Uncomment this var to see the logged header ! ###
### Commenter pour afficher le bandeau 'Connexion'  et  'Inscription'
### Decommenter pour afficher le bandeau 'Connecté'  et  'Se deconnecter'
#$logged = 1;


if ($logged == 1) {
	require_once(VIEWS.'header-logged.php');
	echo "USER LOGGED !";
} else {
	require_once(VIEWS.'header-notlogged.php');
	echo "USER unlogged !";
}


$date = "2016-05-15 10:40:02";

// COMMENTE CAR NECESSITE UNE CONNEXION A LA BASE //
// RETRIEVE FROM 'EVENTS' TABLE //
//$events = retrieve_events_by_type ($DB, $query, $language, $date);

#$events = retrieve_events_by_type ($DB, $query, $language);
$events = retrieve_events_by_type($DB, $_SESSION['query'], $language, $date);

// RETRIEVE FROM 'IDEAS' TABLE //
$ideas = retrieve_ideas_by_type($DB, $_SESSION['query'], $language, $date);


#if ($eventposted == 1) {
# 	$message = "Votre evenement $query a bien ete enregistre, vous pouvez utiliser les fonctions de tri pour le retrouver";
#} elseif (empty($events) AND empty($ideas)) {
#	if($date == date("Y-m-d")) {
#		$date = "aujourd'hui";
#	} else {
#		$date = "le ".$date;
#	}
#	$message = "Désole, aucun idée ou sortie $query pour pratiquer,  $date";
#}else{
#	$message = "";
#}

require_once(VIEWS.'list-head.php');
require_once(VIEWS.'list.php');
require_once(VIEWS.'footer.php');
require_once(MODALS.'modal-footer.php');
require_once(VIEWS.'scripts.php');

?>

