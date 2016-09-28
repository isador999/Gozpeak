<?php

session_start();
require_once(CONTROLLERS.'init.php');
require_once(VIEWS.'styles.php');
require_once(MODELS.'dbconnect.php');
require_once(MODELS.'event_functions.php');


if(isset($_GET['query']) && !empty($_GET['query'])) {
        $query = $_GET['query'];
}

if(isset($_GET['event']) && !empty($_GET['event'])) {
	$eventname = $_GET['event'];
}

/***** Retrieve event infos from Database *****/
$infos_event = retrieve_event($DB, $eventname);
$eventid = $infos_event['id'];

$DiffDate = retrieve_remaining_days_event($DB, $eventname);
if ($DiffDate < 0) {
	$DiffDate = "Evenement terminé";
} else {
	$DiffDate .= " jours";
}


/***** Count number of registered members for event *****/
$nb_members = event_members_count($DB, $eventid);

/***** Check if user logged *****/
$logged = check_logged();

if ($logged == 1) {
	/***** Check if user is already registered to event, or if user is organizer *****/
	$pseudo = $_SESSION['profil'];
	$userid = retrieve_userid($DB, $pseudo);
	$eventuser_entries = check_eventuser_association($DB, $eventid, $userid);

	if ($pseudo == $infos_event['organizer']) {
		$user_is_organizer = 1;
	} elseif(!empty($pseudo)) {
		if($eventuser_entries > 0) {
			$user_registered = 1;
		} else {
			$user_registered = 0;
		}
	}

        require_once(VIEWS.'header-logged.php');
	require_once(MODALS.'modal-postevent-logged.php');
	require_once(VIEWS.'event-logged.php');
	require_once(MODALS.'modal-displaymembers.php');

} else {
        require_once(VIEWS.'header-notlogged.php');
	require_once(MODALS.'modal-postevent-notlogged.php');
	require_once(VIEWS.'event-notlogged.php');
}


require_once(MODALS.'modal-footer.php');
require_once(VIEWS.'scripts.php');
require_once(VIEWS.'footer.php');

unset($_SESSION['msg']);


?>
