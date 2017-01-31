<?php

session_start();

require_once(LIB.'sessions_init.php');
require_once(CONTROLLERS.'init.php');
require_once(MODELS.'dbconnect.php');
require_once(MODELS.'profile_functions.php');


/* Set List of views to be sourced */
$ViewPages = array();
$ViewFooterPages = array();
$ViewNavPages = array();

if (isset($_GET['profil']) && (!empty($_GET['profil']))) {
	$provided_profile = $_GET['profil'];
	$nbre_pseudo = pseudo_exist($DB, $provided_profile);
	if($nbre_pseudo > 0) {
		$pseudo = $provided_profile;
	} else {
		$error="unknown_pseudo";
	}
} elseif (isset($_SESSION['profil']) && (!empty($_SESSION['profil']))) {
	$pseudo = $_SESSION['profil'];
}


if (isset($pseudo)) {
	$infos = profile_info($DB, $pseudo);
	$nb_posted_ideas = count_ideas($DB, $pseudo);

	$logged = check_logged();
	if ($logged == 1) {
		$ViewNavPages[] = MODALS.'modal-postevent-logged.php';
		$ViewNavPages[] = VIEWS.'header-logged.php';
		if ($pseudo == $_SESSION['profil']) {
			$ViewPages[] = MODALS.'modal-profile-eventlist.php';
			$ViewPages[] = VIEWS.'profile-logged.php';
			$ViewPages[] = MODALS.'modal-profile.php';
		} else {
			$ViewPages[] = VIEWS.'profile-notlogged.php';
		}
	} else {
		$ViewNavPages[] = MODALS.'modal-postevent-notlogged.php';
		$ViewNavPages[] = VIEWS.'header-notlogged.php';
		$ViewPages[] = VIEWS.'profile-notlogged.php';
	}

	if ($infos['premium'] == 0) {
		$_SESSION['ispremium'] = "Non";
	} else {
		$_SESSION['ispremium'] = "Oui";
	}
} else {
	$error="unknown_pseudo";
}

/* Retrieve Subscribe date of the user */
$ViewNavPages[] = MODALS.'modal-navbar.php';
$ViewFooterPages[] = MODALS.'modal-footer.php';
$ViewFooterPages[] = VIEWS.'footer.php';

unset($_SESSION['msg']);

/***** If message is set, so profil entered does not exist or link is corrupted *****/
if (isset($error) && ($error == 'unknown_pseudo')) {
	$message='<div class="form-group"> <div class="text-center alert alert-warning fade in"> <a href="#" class="close" data-dismiss="alert">&times;</a> Ce profil n\'existe pas ou le lien est corrompu </div> </div>';
	$_SESSION['msg'] = $message;
	header('location: '.$gozpeak_protocol.$gozpeak_host.'/index.php?page=home');
}

$ViewTitle = $generic[$_SESSION['language']]['region'][0];
require_once(VIEWS.'maintemplate.php');

?>
