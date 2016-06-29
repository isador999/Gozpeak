<?php

session_start();

require_once(LIB.'display.php');
require_once(MODELS.'dbconnect.php');
require_once(MODELS.'activation_functions.php');

if(!isset($_GET['login']) && ($_GET['key'])) {
        $message = "Désolé, cette URL n'est pas valide pour l'activation.";
} 

$display_user = $_GET['login'];
$key = $_GET['key'];

$initial_state = check_account_state($DB, $key, $display_user);
echo "STATUS : $state";

if ($initial_state == 1) {
        $message = '<div class="form-group"> <div class="alert alert-info"> Bonjour '.$pseudo.' , Votre compte est deja actif  ! </div> </div>';
} else {
        update_account_to_active($DB, $key, $display_user);
	$state = check_account_state($DB, $key, $display_user);
	if ($state == 1) {
        	$message = '<div class="form-group"> <div class="alert alert-success"> Bonjour '.$display_user.' , Votre compte vient d\'etre active ! Vous pouvez maintenant vous connecter (Proposer des idees de sorties GoZpeak n\'est pas encore possible). </div> </div>';
	} else {
		$message='<div class="form-group"> <div class="alert alert-danger"> Une erreur est survenue lors de l\'activation, vous devrez peut-être vous réinscrire  (Sinon, envoyez un email à info@gozpeak.com </div> </div>';
	}
}

/******** Finally, set Global var if $message isset, and simply redirect to HOME *********/
if (isset($message)) {
        $_SESSION['msg'] = $message;
}
header('location: http://demo.gozpeak.com/index.php?page=home');


//require_once('views/head.php');
//include_once('Views/headband-notlogged.php');
//require_once('Views/activation.php');

?>

