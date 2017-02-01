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
$ViewFooterPages = array();
$ViewNavPages = array();

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

/********** Tests sortMonths **********/
//$current_eventmonth = ucfirst(strftime("%B"));
//$current_ideamonth = ucfirst(strftime("%B"));
$current_eventmonth = $list[$_SESSION['language']]['monthpicker']['option'][12]['entry'];
$current_ideamonth = $list[$_SESSION['language']]['monthpicker']['option'][12]['entry'];

//Source Views
$logged = check_logged();
if ($logged == 1) {
	$ViewNavPages[] = MODALS.'modal-navbar.php';
	$ViewNavPages[] = MODALS.'modal-postevent-logged.php';
	$ViewNavPages[] = VIEWS.'header-logged.php';

	$ViewPages[] = VIEWS.'list.php';

	$ViewFooterPages[] = MODALS.'modal-footer.php';
	$ViewFooterPages[] = VIEWS.'footer.php';
} else {
	$ViewNavPages[] = MODALS.'modal-navbar.php';
	$ViewNavPages[] = MODALS.'modal-postevent-notlogged.php';
	$ViewNavPages[] = VIEWS.'header-notlogged.php';

	$ViewPages[] = VIEWS.'list.php';

	$ViewFooterPages[] = MODALS.'modal-footer.php';
	$ViewFooterPages[] = VIEWS.'footer.php';
}


$ViewTitle = $generic[$_SESSION['language']]['region'][0].' - '.'Evénements';

require_once(VIEWS.'maintemplate.php');

unset($_SESSION['msg']);

?>
