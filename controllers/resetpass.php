<?php

session_start();

require_once(LIB.'display.php');
require_once(LIB.'sessions_init.php');
require_once(MODELS.'dbconnect.php');
require_once(MODELS.'resetpass_functions.php');


$token = isset($_GET['token']) ? $_GET['token'] : '';
$login = isset($_GET['login']) ? $_GET['login'] : '';
$DBtoken = retrieve_resetpass_token($DB, $login);
$token_expiration = retrieve_resetpass_expiration($DB, $login);


/************ If the link contains required variables, check their validity now *************/
if(empty($token) OR empty($login) OR ($DBtoken !== $token) OR (date('Y-m-d H:i:s') >= $token_expiration)) {
	$message='<div class="form-group"> <div class="alert alert-danger">  Désolé, ce lien est invalide ou expirée.  </div> </div>';
	$result="invalid_link";
}
else {
	$result="valid_link";
}
/*********************************************************************************************/


/******************* Then, redirect to RESETPASSFORM or HOME page, depending on precedent result *********************/
if (isset($result)) {
	//echo $result;
	if($result == "invalid_link") {
	/******** set Global var if message isset, and simply redirect to HOME. *********/
		if (isset($message)) {
			$_SESSION['msg'] = $message;
		}
	} elseif($result == "valid_link") {
		$_SESSION['resetpass'] = 'valid';
		$_SESSION['resetpass_login'] = $login;
	}

	header('location: '.$gozpeak_protocol.$gozpeak_host.'/index.php?page=home');
}



// IF ALL THE PREVIOUS CONDITIONS ARE OK (token, login, etc...), THE SCRIPT WILL LEAVE THE MESSAGES EMPTY, AND THE USER WILL TRY TO CHANGE HIS PASSWORD //
#if(isset($_POST['submit'])) {
#	$pass_one = isset($_POST['pass1']) ? $_POST['pass1'] : '';
#	$pass_confirm = isset($_POST['pass2']) ? $_POST['pass2'] : '';
#	
#	if($pass_one == '' OR $pass_confirm == '') {
#		//header('location: index.php?page=reset_pass&error=2');
#		 my_echo ("4", "red", "Veuillez remplir tous les champs ! ");
#	} elseif($pass_one != $pass_confirm) {
#		//header('location: index.php?page=reset_pass&error=3');
#		my_echo ("4", "red", "Les mots de passe saisis ne correspondent pas ! ");
#	} elseif (strlen($pass_one) > 25 || strlen($pass_one) < 6) {
#		//header('location: index.php?page=reset_pass&error=4');
#		my_echo ("4", "red", "Le mot de passe doit etre compris entre 6 et 25 caracteres !");
#	} else {
#		$newpass = hash("sha1", "$pass_one");
#		update_password($DB, $newpass, $login);
#		set_resetpass_token($DB, 'NULL', $login);
#		set_resetpass_expiration($DB, 'NULL', $login);
#		my_echo ("4", "green", "Votre mot de passe a ete change avec succes !  Redirection vers la page de connexion ... ");
#		header('Refresh: 4,url=index.php?page=connexion');
#	}
#}
#
#
#
#$error = isset($_GET['error']) ? $_GET['error'] : '';
#switch ($error) {
#        case 1:
#                my_echo ("4", "red", "Le lien fourni est invalide ou expiré... Vous allez etre redirige vers la page d'accueil. ");
#                break;
#        case 2:
#                my_echo ("4", "red", "Veuillez remplir tous les champs de réinitialisation ! ");
#                break;
#        case 3:
#                my_echo ("4", "red", "Les mots de passe saisis ne correspondent pas ! ");
#		break;
#	case 4:
#		my_echo ("4", "red", "Le mot de passe doit etre compris entre 6 et 25 caracteres !");
#        }
#
#
#include_once('Views/reset_pass.php');
#include_once('Views/footer.php');
#
?>

