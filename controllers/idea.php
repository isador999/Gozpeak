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
$ViewFooterPages = array();
$ViewNavPages = array();


if(isset($_GET['query']) && !empty($_GET['query'])) {
  $query = $_GET['query'];
}

if(isset($_GET['idea']) && !empty($_GET['idea'])) {
	$ideaname = $_GET['idea'];
}



/***** Retrieve idea informations from Database *****/
$infos_idea = retrieve_idea($DB, $ideaname);
$ideaid = $infos_idea['id'];

//Set corresponding language vars in $infos_idea
switch($infos_idea['level_language']) {
  case "beginner":
    $infos_idea['level_language'] = $modal[$_SESSION['language']]['selectlanglevel']['option'][0]['entry'];
    break;
  case "middle":
    $infos_idea['level_language'] = $modal[$_SESSION['language']]['selectlanglevel']['option'][1]['entry'];
    break;
  case "advanced":
    $infos_idea['level_language'] = $modal[$_SESSION['language']]['selectlanglevel']['option'][2]['entry'];
    break;
  default:
    $infos_idea['level_language'] = "<i> Unknown level_language </i>";
}


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

  $ViewNavPages[] = MODALS.'modal-postevent-logged.php';
  $ViewNavPages[] = VIEWS.'header-logged.php';
  $ViewPages[] = MODALS.'modal-displaymembers.php';
  $ViewPages[] = VIEWS.'idea-logged.php';
} else {
  $ViewNavPages[] = MODALS.'modal-postevent-notlogged.php';
  $ViewNavPages[] = VIEWS.'header-notlogged.php';
  $ViewPages[] = VIEWS.'idea-notlogged.php';
}

$ViewNavPages[] = MODALS.'modal-navbar.php';
$ViewFooterPages[] = MODALS.'modal-footer.php';
$ViewFooterPages[] = VIEWS.'footer.php';

$ViewTitle = $generic[$_SESSION['language']]['region'][0].' - '.$generic[$_SESSION['language']]['city'][0]['name'];

require_once(VIEWS.'maintemplate.php');

unset($_SESSION['msg']);

?>
