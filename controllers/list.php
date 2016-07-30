<?php

#require_once('lib/sessions.php');

require_once(CONTROLLERS.'init.php');
require_once(MODELS.'dbconnect.php');
require_once(MODELS.'list_pagination_functions.php');
#require_once(LIB.'check_login.php');
require_once(LIB.'display.php');
require_once(VIEWS.'styles.php');

if(isset($_GET['query']) && !empty($_GET['query'])) {
	//$_SESSION['query'] = $_GET['query'];
	$query = $_GET['query'];
}


/***** Events display *****/
$nb_events = count_events_by_type($DB, $query);
$nb_rows_per_page = 15;

// Nombre de pages à afficher
$events_total_pages = ceil($nb_events / $nb_rows_per_page);


// get the current page or set a default
if (isset($_GET['eventpage']) && is_numeric($_GET['eventpage'])) {
   // cast var as int
   $events_current_page = (int) $_GET['eventpage'];
} else {
   // default page num
   $events_current_page = 1;
} // end if


// if event current page is greater than total pages...
if ($events_current_page > $events_total_pages) {
   // set current page to last page
   $events_current_page = $events_total_pages;
} // end if
// if current page is less than first page...
if ($events_current_page < 1) {
   // set current page to first page
   $events_current_page = 1;
} // end if


// the offset of the list, based on current page 
$events_offset = ($events_current_page - 1) * $nb_rows_per_page;
$events = event_paginate_retrieve_starting_id($DB, $events_offset, $nb_rows_per_page, $query);


#$date = (!empty($_GET['date'])) ? $_GET['date'] : date("Y-m-d");
$language = (!empty($_GET['language'])) ? $_GET['language'] : '';

$logged = check_logged();
if ($logged == 1) {
	require_once(VIEWS.'header-logged.php');
} else {
	require_once(VIEWS.'header-notlogged.php');
}


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

