<?php

session_start();
require_once(CONTROLLERS.'init.php');


/* Set List of views to be sourced */
$ViewPages = array();
$ViewFooterPages = array();
$ViewNavPages = array();


/***** Check if user logged *****/
$logged = check_logged();
if ($logged == 1) {
  $ViewNavPages[] = MODALS.'modal-postevent-logged.php';
  $ViewNavPages[] = VIEWS.'header-logged.php';
} else {
  $ViewNavPages[] = MODALS.'modal-postevent-notlogged.php';
  $ViewNavPages[] = VIEWS.'header-notlogged.php';
}

$ViewNavPages[] = MODALS.'modal-navbar.php';
$ViewPages[] = VIEWS.'home.php';

$ViewFooterPages[] = MODALS.'modal-footer.php';
$ViewFooterPages[] = VIEWS.'footer.php';


/*********************************** Special : *************************************/
/***** If resetpass mode, it means that reset_pass valid link has been clicked *****/
/***** So, special JS script is needed to display modal ****************************/
if(isset($_SESSION['resetpass']) && ($_SESSION['resetpass'] == 'valid')) {
  $ViewPages[] = MODALS.'modal-resetpass.php';
}
/*************** End of Modal Sourcing ***************/


$ViewTitle = $generic[$_SESSION['language']]['region'][0].' - '.$generic[$_SESSION['language']]['city'][0]['name'];
require_once(VIEWS.'maintemplate.php');

/****** Unset current messages at the end (to the refresh doesn't display all the time $msg) *******/
unset($_SESSION['msg']);
/*if(isset($_SESSION['msg'])) echo $_SESSION['msg'];*/
unset($_SESSION['resetpass']);

?>
