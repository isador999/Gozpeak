<?php

//$time = $_SERVER[‘REQUEST_TIME’];

/**
 * for a 30 minute timeout, specified in seconds
 */
//$timeout_duration = 3600;

/**
 * Here we look for the user’s LAST_ACTIVITY timestamp. If
 * it’s set and indicates our $timeout_duration has passed,
 * blow away any previous $_SESSION data and start a new one.
 */
//if (isset($_SESSION[‘LAST_ACTIVITY’]) && ($time - $_SESSION[‘LAST_ACTIVITY’]) > $timeout_duration) {
//  session_unset();
//  session_destroy();
session_start();
//}
header('Content-Type: text/html; charset=UTF-8');

/**
 * Finally, update LAST_ACTIVITY so that our timeout
 * is based on it and not the user’s login time.
 */
//$_SESSION[‘LAST_ACTIVITY’] = $time;


// Set Gozpeak protocol and host
if(!empty($_SERVER['HTTPS'])) {
  $gozpeak_protocol = 'https://';
} else {
  $gozpeak_protocol = 'http://';
}

$gozpeak_host = $_SERVER['HTTP_HOST'];
$baseUrl = $gozpeak_protocol.$gozpeak_host;

// Redirect function
function redirect_to_page($baseUrl, $current_page) {
  if (isset($current_page) AND (!empty($current_page))) {
    header('location: '.$baseUrl.'/index.php?page='.$current_page);
  } else {
    header('location: '.$baseUrl.'/');
  }
}


// Check browser language + set site language
if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
	$language = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
	$language = $language{0}.$language{1};

  $_SESSION['language'] = 'fr';
} else {
	$_SESSION['language'] = 'fr';
}


?>
