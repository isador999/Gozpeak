<?php

session_start();

// CHECK LANGUAGE //
$language = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
$language = $language{0}.$language{1};
if($language != 'fr' || $language != 'en') {
	$_SESSION['language'] = 'fr';
} else {
        $_SESSION['language'] = $language;
}

$_SESSION['user_status'] = 'unknown';


?>

