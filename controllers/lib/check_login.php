<?php

function check_logged () {
if (!isset($_SESSION['logged']) || !$_SESSION['logged']) {
	//header('location: index.php?page=connexion');
	$logged = 0;
}
elseif (isset($_SESSION['logged']) && $_SESSION['logged']) {
	$logged = 1;
	$user = isset($_SESSION['email']) ? $_SESSION['email'] : '';
	}
else {
	session_destroy();
	$logged = 0;
	}

return $logged;
}


?>

