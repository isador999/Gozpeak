<?php

session_start();
require_once('./language.php');
require_once('./lib/sessions_init.php');
require_once('../models/dbconnect.php');
require_once('../models/resetpass_functions.php');

$page = isset($_GET['page']) ? $_GET['page'] : '';

if($_POST) {
	/***** Check if login has been retrieved from the link, and the resetpass.php page *****/
	if(isset($_SESSION['resetpass_login']) && (!empty($_SESSION['resetpass_login']))) {
		$resetpass_login = $_SESSION['resetpass_login'];
	} else {
		$error="login_empty";
	}

	$pass_one = isset($_POST['resettedpass']) ? $_POST['resettedpass'] : '';
	$pass_confirm = isset($_POST['resettedpass_check']) ? $_POST['resettedpass_check'] : '';

	if(empty($pass_one) OR empty($pass_confirm)) {
		$error="empty_fields";
	} elseif (strlen($pass_one) > 25 || strlen($pass_one) < 6) {
		$error="bad_length_pass";
	} elseif (ctype_alnum($pass_one)) {
    $error="notcompliant_password";
	} elseif (!preg_match("/.*[0-9].*[0-9].*+/", $pass_one) || !preg_match("/.*[A-Z].*+/", $pass_one)) {
    $error="notcompliant_password";
  } elseif ($pass_one != $pass_confirm) {
    $error="passwords_not_matching";
	} else {
		/***** 'htmlentities' function permit to esacpe/protect fields against attacks, like XSS *****/
    $pass_one = htmlspecialchars(trim($pass_one));
    $pass_confirm = htmlspecialchars(trim($pass_confirm));

		$new_dbpassword = password_hash($pass_one, PASSWORD_DEFAULT);

		/***** Check if the old password was set, otherwise, it could be a hacker which has a fake account... *****/
		$old_dbpassword=retrieve_pass_from_pseudo($DB, $resetpass_login);
		if(isset($old_dbpassword) && (!empty($old_dbpassword))) {
			$pass_updated_successfully = update_password($DB, $new_dbpassword, $resetpass_login);
			#echo "Result Query : $result_query";
			if ($pass_updated_successfully == 0) {
				set_resetpass_token($DB, 'NULL', $resetpass_login);
				set_resetpass_expiration($DB, 'NULL', $resetpass_login);
				$message='<div class="form-group"> <div class="alert alert-success fade in"> <a href="#" class="close" data-dismiss="alert">&times;</a> Votre mot de passe Gozpeak a été réinitialisé avec succès ;-)  </div> </div>';
			} else {
				$message='<div class="form-group"> <div class="alert alert-danger fade in"> <a href="#" class="close" data-dismiss="alert">&times;</a> Désolé, une erreur est survenue.  Veuillez réessayer cette opération ultérieurement </div> </div>';
			}
		} else {
			$message='<div class="form-group"> <div class="alert alert-danger fade in"> <a href="#" class="close" data-dismiss="alert">&times;</a>  Désolé, une erreur est survenue.  Veuillez réessayer cette opération ultérieurement </div> </div>';
		}
	}
}



if(isset($error)) {
	if ($error == 'login_empty') {
		$message='<div class="form-group"> <div class="alert alert-danger fade in">  Désolé, une erreur est survenue, probablement à cause du lien de récupération. Veuillez réessayer cette opération ultérieurement </div> </div>';
	}
  elseif ($error == 'empty_fields') {
    $message='<div class="form-group"> <div class="alert alert-danger fade in"> Veuillez remplir les champs obligatoires </div> </div>';
  }
  elseif ($error == 'bad_length_pass') {
    $message='<div class="form-group"> <div class="alert alert-danger fade in"> Le mot de passe doit etre compris entre 8 et 25 caracteres </div> </div>';
  }
  elseif ($error == 'notcompliant_password') {
    $message='<div class="form-group"> <div class="alert alert-danger fade in"> Le mot de passe choisi ne respecte pas la politique de sécurité, il doit contenir au minimum 2 chiffres, une majuscule et un caractère spécial. </div> </div>';
  }
  elseif ($error == 'passwords_not_matching') {
    $message='<div class="form-group"> <div class="alert alert-danger fade in"> Les mots de passe ne correspondent pas </div> </div>';
  }
}


/******** Finally, set Global var if $message isset, and simply redirect to HOME *********/
if (isset($message)) {
  $_SESSION['msg'] = $message;
}

redirect_to_page($baseUrl, $page);

?>
