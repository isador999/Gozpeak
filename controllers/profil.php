<?php

session_start();

require_once(LIB.'sessions_init.php');
require_once(LIB.'display.php');
require_once(CONTROLLERS.'init.php');
require_once(MODELS.'dbconnect.php');
require_once(MODELS.'profile_functions.php');
require_once(MODALS.'modal-navbar.php');
require_once(MODALS.'modal-footer.php');


if(isset($_SESSION['profil']) && (!empty($_SESSION['profil']))) {
	$pseudo = $_SESSION['profil'];
} elseif (!isset($_SESSION['profil']) OR (empty($_SESSION['profil']))) {
	$pseudo = isset($_GET['profil']) ? $_GET['profil'] : '';

	/***** Check if profil entered exists *****/
	$nbre_pseudo = pseudo_exist($DB, $pseudo);
	if (!$nbre_pseudo > 0) {
		unset($pseudo);
		$error="unknown_pseudo";
	}
}


if (isset($pseudo)) {
	$infos = profile_info($DB, $pseudo);
	$nb_events = count_events($DB, $pseudo);

	$logged = check_logged();
	if ($logged == 1) {
	        require_once(VIEWS.'header-logged.php');
		require_once(MODALS.'modal-profile.php');
		require_once(VIEWS.'profile-logged.php');
	} else {
	        require_once(VIEWS.'header-notlogged.php');
		require_once(VIEWS.'profile-unlogged.php');
	}

	require_once(VIEWS.'footer.php');
	require_once(VIEWS.'scripts.php');

	if ($infos['premium'] == 0) {
		$_SESSION['ispremium'] = "Non";
	} else {
		$_SESSION['ispremium'] = "Oui";
	}
}


/***** If message is set, so profil entered does not exist or link is corrupted *****/
if (isset($error)) {
	if ($error == 'unknown_pseudo') {
		$message='<div class="form-group profile-head"> <div class="alert alert-danger fade in"> <a href="#" class="close" data-dismiss="alert">&times;</a> Ce profil n\'existe pas ou le lien est corrompu </div> </div>';
		$_SESSION['msg'] = $message;
	}
	require_once(VIEWS.'header-notlogged.php');
	echo $_SESSION['msg'];
	unset($_SESSION['msg']);
}

?>

