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

#$date = (!empty($_GET['date'])) ? $_GET['date'] : date("Y-m-d");
$language = (!empty($_GET['language'])) ? $_GET['language'] : '';

$logged = check_logged();
if ($logged == 1) {
	require_once(VIEWS.'header-logged.php');
} else {
	require_once(VIEWS.'header-notlogged.php');
}

$date = "2016-05-15 10:40:02";
#$datetime = "2016-07-26 14:30:30";

//$events = retrieve_events_by_type ($DB, $query, $language, $date);

#$events = retrieve_events_by_type ($DB, $query, $language);
$events = retrieve_events_by_type($DB, $_SESSION['query'], $language);

#foreach ($events as $event) {
#	echo $event['eventdatetime'];
#}


// RETRIEVE FROM 'IDEAS' TABLE //
$ideas = retrieve_ideas_by_type($DB, $_SESSION['query'], $language, $date);


require_once(VIEWS.'list-head.php');
require_once(VIEWS.'list.php');

/*** Debug, display retrieved events ***/
#if (!empty($events)) {
#	foreach ($events as $event) {
#		echo $event['eventdatetime'];
#	}
#} else {
#	echo "Event empty ? ";
#}

require_once(VIEWS.'footer.php');
require_once(MODALS.'modal-footer.php');
require_once(VIEWS.'scripts.php');

?>

