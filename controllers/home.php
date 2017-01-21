<?php

session_start();
require_once(CONTROLLERS.'init.php');


/* Set List of views to be sourced */
$ViewPages = array();

/***** Check if user logged *****/

$logged = check_logged();
if ($logged == 1) {
  $ViewPages[] = VIEWS.'header-logged.php';
} else {
  $ViewPages[] = VIEWS.'header-notlogged.php';
}

$ViewPages[] = VIEWS.'home.php';
$ViewPages[] = VIEWS.'footer.php';


/*************** Source Modals ***************/
if ($logged == 1) {
  $ViewPages[] = MODALS.'modal-postevent-logged.php';
} else {
  $ViewPages[] = MODALS.'modal-postevent-notlogged.php';
}

$ViewPages[] = MODALS.'modal-navbar.php';
$ViewPages[] = MODALS.'modal-footer.php';

/*********************************** Special : *************************************/
/***** If resetpass mode, it means that reset_pass valid link has been clicked *****/
/***** So, special JS script is needed to display modal ****************************/
if(isset($_SESSION['resetpass']) && ($_SESSION['resetpass'] == 'valid')) {
  $ViewPages[] = MODALS.'modal-resetpass.php';
}
/*************** End of Modal Sourcing ***************/


$ViewTitle = $generic['fr']['region'][0].' - '.$generic['fr']['city'][0]['name'];
require_once(VIEWS.'maintemplate.php');

/****** Unset current messages at the end (to the refresh doesn't display all the time $msg) *******/
unset($_SESSION['msg']);
/*if(isset($_SESSION['msg'])) echo $_SESSION['msg'];*/
unset($_SESSION['resetpass']);

?>
