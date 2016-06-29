<?php

require_once('lib/sessions.php');

$logged = check_logged();
//if(session_status() == 1) {
//	header('location: index.php?page=connexion');
//}

if ($logged == 1) {
	include_once('Views/headband-logged.php');
	echo $_SESSION['email'];
	echo $_SESSION['logged'];
}
else {
	header('location: index.php?page=connexion');
	}

require_once('Views/bienvenue.php');

?>


