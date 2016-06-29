<?php

session_start();

// CHECK LANGUAGE //
if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
	$language = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
	$language = $language{0}.$language{1};
}

#if(!isset($language)) {
#	$_SESSION['language'] = 'fr';
#}

// It was not working, cause to undefined $language var (cause to first condition)... //
if($language != 'fr' || $language != 'en') {
	$_SESSION['language'] = 'fr';
} else {
        $_SESSION['language'] = $language;
}

$_SESSION['user_status'] = 'unknown';

?>

