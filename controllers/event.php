<?php

session_start();
require_once(CONTROLLERS.'init.php');
require_once(VIEWS.'styles.php');
require_once(MODELS.'dbconnect.php');
require_once(MODELS.'event_functions.php');


if(isset($_GET['query']) && !empty($_GET['query'])) {
        $query = $_GET['query'];
}


/***** Check if user logged *****/
$logged = check_logged();

if ($logged == 1) {
        require_once(VIEWS.'header-logged.php');
	require_once(MODALS.'modal-postevent-logged.php');
} else {
        require_once(VIEWS.'header-notlogged.php');
	require_once(MODALS.'modal-postevent-notlogged.php');
}

$eventname = $_GET['event'];
$infos_event = retrieve_event($DB, $eventname);
$DiffDate = retrieve_remaining_days_event($DB, $eventname);


/***** Check if user is already registered to the event *****/
if ($logged == 1) {
	$pseudo = $_SESSION['profil'];
	if(!empty($pseudo)) {
		$userid = retrieve_userid($DB, $pseudo);
		$eventid = $infos_event['id'];
		$nbre_entries = check_eventuser_association($DB, $eventid, $userid);

		if($nbre_entries > 0) {
			$user_registered = 1;
		} else {
			$user_registered = 0;
		}
	}
}


if ($DiffDate < 0) {
	#$DiffDate = preg_match("/-/", "", $Brutvalue);
	$DiffDate = "Evenement terminé";
} else {
	$DiffDate .= " jours";
}

require_once(VIEWS.'event.php');
require_once(MODALS.'modal-footer.php');
require_once(VIEWS.'scripts.php');
require_once(VIEWS.'footer.php');

unset($_SESSION['msg']);


?>
