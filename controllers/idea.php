<?php

session_start();
require_once(CONTROLLERS.'init.php');
require_once(MODELS.'dbconnect.php');
require_once(MODELS.'idea_functions.php');

/***** Default variables *****/
$user_is_organizer = 0;
$user_registered = 0;
/*****************************/
/* Set List of views to be sourced */
$ViewPages = array();


if(isset($_GET['query']) && !empty($_GET['query'])) {
  $query = $_GET['query'];
}

if(isset($_GET['idea']) && !empty($_GET['idea'])) {
	$ideaname = $_GET['idea'];
}



/***** Retrieve idea informations from Database *****/
$infos_idea = retrieve_idea($DB, $ideaname);
$ideaid = $infos_idea['id'];

$DiffDate = retrieve_remaining_days_idea($DB, $ideaname);
if ($DiffDate < 0) {
	$DiffDate = "Evenement terminé";
} else {
	$DiffDate .= " jours";
}


/***** Count number of registered members for event *****/
$nb_members = idea_members_count($DB, $ideaid);

/***** Check if user logged *****/
$logged = check_logged();

if ($logged == 1) {
	/***** Check if user is already registered to the event *****/
  $pseudo = $_SESSION['profil'];
  $userid = retrieve_userid($DB, $pseudo);
  $nbre_entries = check_ideauser_association($DB, $ideaid, $userid);

	if ($pseudo == $infos_idea['organizer']) {
		$user_is_organizer = 1;
		//require_once(MODALS.'modal-eventedit.php');
    $ViewPages[] = MODALS.'modal-eventedit.php';
	} elseif(!empty($pseudo)) {
    if($nbre_entries > 0) {
      $user_registered = 1;
    } else {
      $user_registered = 0;
    }
      if($nbre_entries > 0) {
        $user_registered = 1;
      } else {
        $user_registered = 0;
      }
  }

  $ViewPages[] = VIEWS.'header-logged.php';
  $ViewPages[] = MODALS.'modal-postevent-logged.php';
  $ViewPages[] = VIEWS.'idea-logged.php';
  $ViewPages[] = MODALS.'modal-displaymembers.php';
} else {
  $ViewPages[] = VIEWS.'header-notlogged.php';
  $ViewPages[] = MODALS.'modal-postevent-notlogged.php';
  $ViewPages[] = VIEWS.'idea-notlogged.php';
}

$ViewPages[] = MODALS.'modal-navbar.php';
$ViewPages[] = MODALS.'modal-footer.php';
$ViewPages[] = VIEWS.'footer.php';

$ViewTitle = $generic['fr']['region'][0].' - '.$generic['fr']['city'][0]['name'];

require_once(VIEWS.'maintemplate.php');

unset($_SESSION['msg']);

?>
