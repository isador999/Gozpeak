<?php
        require_once(CONTROLLERS.'init.php');

	// CONNEXION A LA BDD gozpeak_dev (pas forcément utile pour la page HOME pour l'instant... //
        #require_once(MODELS.'dbconnect.php');

	require_once(VIEWS.'styles.php');

	$logged = check_logged();
	### Uncomment this var to see the logged header ! ###
	### Commenter pour afficher le bandeau 'Connexion'  et  'Inscription'
	### Decommenter pour afficher le bandeau 'Connecté'  et  'Se deconnecter'
	#$logged = 1;

	if ($logged == 1) {
        	include_once(VIEWS.'header-logged.php');
	        echo "USER LOGGED !";
	} else {
	        include_once(VIEWS.'header-notlogged.php');
	        echo "USER unlogged !";
	}

	### Après le bon HEADER, sourcer ensuite le corps HTML, le footer et les scripts JS ###
        require_once(VIEWS.'home.php');
        require_once(VIEWS.'footer.php');
	require_once(VIEWS.'scripts.php');
?>

