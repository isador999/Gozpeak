<?php

#require_once('lib/sessions.php');

require_once(CONTROLLERS.'init.php');
require_once(MODELS.'dbconnect.php');
require_once(MODELS.'list_pagination_functions.php');

//setlocale(LC_TIME, 'fr_FR');
setlocale(LC_TIME, 'fr_FR.UTF8');
setlocale(LC_ALL, 'fra_fra');
date_default_timezone_set("Europe/Paris");
mb_internal_encoding("UTF-8");

$ViewPages = array();

if(isset($_GET['query']) && !empty($_GET['query'])) {
	$query = $_GET['query'];
}


/***** Define 3 current years *****/
$sortYears = array();
$sortYears[] = date("Y")-1;
$sortYears[] = date("Y");
$sortYears[] = date("Y")+1;

$current_eventyear = date("Y");
$current_ideayear = date("Y");

$sortMonths = array();
//$sortMonths[] = ucfirst(strftime("%B"));
for($i=0;$i<=11;$i++) {
	//$sortMonths[] = ucfirst(strftime("%B", strtotime("+".$i." month")));
	$sortMonths[] = ucfirst(strftime("%B", strtotime("+".($i*30)." days")));
}



/********** Tests sortMonths **********/

// $sortMonths[] = ucfirst((strftime("%B")));
// $sortMonths[] = ucfirst((strftime("%B"+1)));

//$sortMonths[] = strftime("F");
//$sortMonths[] = date("F", strtotime("+1 month"));

// $sortMonths[] = date(("F")+2);
// $sortMonths[] = date(("F")+3);
// $sortMonths[] = date(("F")+4);
// $sortMonths[] = date(("F")+5);
// $sortMonths[] = date(("F")+6);
// $sortMonths[] = date(("F")+7);
// $sortMonths[] = date(("F")+8);
// $sortMonths[] = date(("F")+9);
// $sortMonths[] = date(("F")+10);
// $sortMonths[] = date(("F")+11);

//$current_eventmonth = ucfirst(strftime("%B"));
//$current_ideamonth = ucfirst(strftime("%B"));
$current_eventmonth = $current_ideamonth = $list[$_SESSION['language']]['monthpicker']['option'][0]['entry'];


// $nb_events = count_events_by_type($DB, $query, $filteredLanguages, $current_eventyear);
//
// $nb_rows_per_page = 15;
//
// $events_total_pages = ceil($nb_events / $nb_rows_per_page);
//
//
// if (isset($_GET['eventpage']) && is_numeric($_GET['eventpage'])) {
//
//   $events_current_page = (int) $_GET['eventpage'];
// } else {
//
//   $events_current_page = 1;
// }
//
//
//
// if ($events_current_page > $events_total_pages) {
//
//   $events_current_page = $events_total_pages;
// }
//
// if ($events_current_page < 1) {
//
//   $events_current_page = 1;
// }
//
// $events_offset = ($events_current_page - 1) * $nb_rows_per_page;
//
//
//
//
// $nb_ideas = count_ideas_by_type($DB, $query, $filteredLanguages, $current_ideayear);
//
// $nb_rows_per_page = 15;
//
// $ideas_total_pages = ceil($nb_ideas / $nb_rows_per_page);
//
//
// if (isset($_GET['ideapage']) && is_numeric($_GET['ideapage'])) {
//
//   $ideas_current_page = (int) $_GET['ideapage'];
// } else {
//
//   $ideas_current_page = 1;
// }
//
//
//
// if ($ideas_current_page > $ideas_total_pages) {
//
//   $ideas_current_page = $ideas_total_pages;
// }
//
// if ($ideas_current_page < 1) {
//
//   $ideas_current_page = 1;
// }
//
//
// $ideas_offset = ($ideas_current_page - 1) * $nb_rows_per_page;
//
// $events = list_events_by_type($DB, $events_offset, $nb_rows_per_page, $query, $filteredLanguages, $current_eventyear);
// $ideas = list_ideas_by_type($DB, $ideas_offset, $nb_rows_per_page, $query, $filteredLanguages, $current_ideayear);
/****************************************************************/

//Source Views
$logged = check_logged();
if ($logged == 1) {
	$ViewPages[] = VIEWS.'header-logged.php';
	$ViewPages[] = VIEWS.'list.php';
	$ViewPages[] = VIEWS.'footer.php';
	$ViewPages[] = MODALS.'modal-navbar.php';
	$ViewPages[] = MODALS.'modal-postevent-logged.php';
	$ViewPages[] = MODALS.'modal-footer.php';
} else {
	$ViewPages[] = VIEWS.'header-notlogged.php';
	$ViewPages[] = VIEWS.'list.php';
	$ViewPages[] = VIEWS.'footer.php';
	$ViewPages[] = MODALS.'modal-navbar.php';
	$ViewPages[] = MODALS.'modal-postevent-notlogged.php';
	$ViewPages[] = MODALS.'modal-footer.php';
}


$ViewTitle = $generic[$_SESSION['language']]['region'][0].' - '.'Evénements';

require_once(VIEWS.'maintemplate.php');

unset($_SESSION['msg']);

?>
