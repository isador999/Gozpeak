<?php

session_start();

if(!empty($_SERVER['HTTPS'])) {
        $gozpeak_protocol = 'https://';
} else {
        $gozpeak_protocol = 'http://';
}

$gozpeak_host = $_SERVER['HTTP_HOST'];

// CHECK LANGUAGE //
if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
	$language = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
	$language = $language{0}.$language{1};

	// It was not working, cause to undefined $language var (cause to first condition)... //
	if($language != 'fr' || $language != 'en') {
		$_SESSION['language'] = 'fr';
	} else {
       		$_SESSION['language'] = $language;
	}
} else {
	$_SESSION['language'] = 'fr';
}

#$_SESSION['user_status'] = 'unknown';

?>

