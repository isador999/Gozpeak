<?php

session_start();
require_once(CONTROLLERS.'language.php');
require_once(LIB.'sessions_init.php');
require_once(MODELS.'dbconnect.php');
require_once(MODELS.'activation_functions.php');

if(!isset($_GET['login']) && ($_GET['key'])) {
  $message = "Désolé, cette URL n'est pas valide pour l'activation.";
}

$display_user = $_GET['login'];
$key = $_GET['key'];

$initial_state = check_account_state($DB, $key, $display_user);
#echo "STATUS : $state";

if ($initial_state == 1) {
  $message = '<div class="form-group"> <div class="alert alert-info fade in"> <a href="#" class="close" data-dismiss="alert">&times;</a> Bonjour '.$pseudo.' , Votre compte est deja actif  ! </div> </div>';
} else {
  update_account_to_active($DB, $key, $display_user);
	$state = check_account_state($DB, $key, $display_user);
	if ($state == 1) {
  	$message = '<div class="form-group"> <div class="alert alert-success fade in"> <a href="#" class="close" data-dismiss="alert">&times;</a> Bonjour '.$display_user.' , Votre compte vient d\'etre active ! Vous pouvez maintenant vous connecter,  et proposer de nouvelles idées d\'activités linguistiques ! </div> </div>';
	} else {
		$message='<div class="form-group"> <div class="alert alert-danger fade in"> <a href="#" class="close" data-dismiss="alert">&times;</a> Une erreur est survenue lors de l\'activation, vous devrez peut-être vous réinscrire  (Ou envoyez un email au support info@gozpeak.com) </div> </div>';
	}
}



/******** Finally, set Global var if $message isset, and simply redirect to HOME *********/
if (isset($message)) {
  $_SESSION['msg'] = $message;
}
header('location: '.$baseUrl.'/index.php?page=home');

?>
