<?php

session_start();

$_SESSION = array();
if(session_destroy()) { 
	$message='<div class="form-group"> <div class="alert alert-success">Vous avez été déconnecté avec succès. A bientôt ;) </div> </div>';
}

#if(!isset($_GET['query']) or empty($_GET['query'])) {
#	$query = "gozpeak";
#}


if (isset($message)) {
	session_start();
        $_SESSION['msg'] = $message;
}

header('location: http://demo.gozpeak.com/index.php?page=home');


?>
