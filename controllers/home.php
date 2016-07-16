<?php
	session_start();
        require_once(CONTROLLERS.'init.php');

	// CONNEXION A LA BDD gozpeak_dev (pas forcément utile pour la page HOME pour l'instant... //
        #require_once(MODELS.'dbconnect.php');

	require_once(VIEWS.'styles.php');

	/***** Check if user logged *****/
	$logged = check_logged();
	if ($logged == 1) {
        	require_once(VIEWS.'header-logged.php');
	        echo "USER LOGGED !";
	} else {
	        require_once(VIEWS.'header-notlogged.php');
	        echo "USER unlogged !";
	}


	### Après le bon HEADER, sourcer ensuite le corps HTML, le footer et les scripts JS ###
	require_once(MODALS.'modal-footer.php');


	/***** Special : If resetpass mode, it means that reset_pass valid link has been clicked *****/
	/***** So, special JS script is needed to display modal *****/
	if(isset($_SESSION['resetpass']) && ($_SESSION['resetpass'] == 'valid')) {
		require_once(VIEWS.'scripts_resetpass.php');
		require_once(MODALS.'modal-resetpass.php');
	}

	require_once(VIEWS.'scripts.php');
        require_once(VIEWS.'home.php');
        require_once(VIEWS.'footer.php');

	/****** Unset current messages at the end (to the refresh doesn't display all the time $msg) *******/
	unset($_SESSION['msg']);
	unset($_SESSION['resetpass']);
?>

