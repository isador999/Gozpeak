<?php

session_start();

require_once(CONTROLLERS.'language.php');
require_once(LIB.'sessions_init.php');

$_SESSION = array();
if(session_destroy()) {
	$message='<div class="form-group"> <div class="alert alert-success fade in"><a href="#" class="close" data-dismiss="alert">&times;</a>  Vous avez été déconnecté avec succès. A bientôt ;) </div> </div>';
}

#if(!isset($_GET['query']) or empty($_GET['query'])) {
#	$query = "gozpeak";
#}


/******** Finally, set Global var if $message isset, and simply redirect to HOME *********/
if (isset($message)) {
	session_start();
  $_SESSION['msg'] = $message;
}

header('location: '.$baseUrl.'/');

?>
