<?php

session_start();
require_once(CONTROLLERS.'init.php');
require_once(MODELS.'dbconnect.php');
require_once(MODELS.'event_functions.php');

/***** Default variables *****/
$user_is_organizer = 0;
$user_registered = 0;
/*****************************/
/* Set List of views to be sourced */
$ViewPages = array();
$ViewFooterPages = array();
$ViewNavPages = array();


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

  $ViewNavPages[] = MODALS.'modal-postevent-logged.php';
  $ViewNavPages[] = VIEWS.'header-logged.php';
  $ViewPages[] = MODALS.'modal-displaymembers.php';
  $ViewPages[] = VIEWS.'event-logged.php';
} else {
  $ViewNavPages[] = VIEWS.'header-notlogged.php';
  $ViewNavPages[] = MODALS.'modal-postevent-notlogged.php';
  $ViewPages[] = VIEWS.'event-notlogged.php';
}

$ViewNavPages[] = MODALS.'modal-navbar.php';

$ViewFooterPages[] = MODALS.'modal-footer.php';
$ViewFooterPages[] = VIEWS.'footer.php';

$ViewTitle = $generic[$_SESSION['language']]['region'][0].' - '.$generic[$_SESSION['language']]['city'][0]['name'];


require_once(VIEWS.'maintemplate.php');

unset($_SESSION['msg']);

?>
