<?php

session_start();
require_once('./language.php');
require_once('./lib/sessions_init.php');
require_once('../models/dbconnect.php');
require_once('../models/resetpass_functions.php');


/******** Controller to change your password (profile page) ********/
// IF ALL THE PREVIOUS CONDITIONS ARE OK (token, login, etc...), THE SCRIPT WILL LEAVE THE MESSAGES EMPTY, AND THE USER WILL TRY TO CHANGE HIS PASSWORD //
if(isset($_POST)) {
	$actual_password = isset($_POST['profile_password']) ? $_POST['profile_password'] : '';
	$pass_one = isset($_POST['profile_new_password']) ? $_POST['profile_new_password'] : '';
	$pass_confirm = isset($_POST['profile_confirm_new_password']) ? $_POST['profile_confirm_new_password'] : '';

	$error=1;

	/***** Escape bad characters *****/
	$actual_passsword = htmlspecialchars(trim($actual_password));
	$pass_one = htmlspecialchars(trim($pass_one));
	$pass_confirm = htmlspecialchars(trim($pass_confirm));


	if($actual_password == '' OR $pass_one == '' OR $pass_confirm == '') {
		echo "EMPTY FIELDS";
		$message='<div class="form-group"> <div class="alert alert-danger fade in"> <a href="#" class="close" data-dismiss="alert">&times;</a> Erreur lors du changement de mot de passe </div> </div>';
		$error=1;
	} elseif($pass_one != $pass_confirm) {
		echo "ERROR CONFIRM";
		$message='<div class="form-group"> <div class="alert alert-danger fade in"> <a href="#" class="close" data-dismiss="alert">&times;</a> La confirmation de mot de passe a échouée </div> </div>';
		$error=1;
	} elseif (strlen($pass_one) > 25 || strlen($pass_one) < 6) {
		$message='<div class="form-group"> <div class="alert alert-danger fade in"> <a href="#" class="close" data-dismiss="alert">&times;</a> Le nouveau mot de passe n\'est pas valide </div> </div>';
		$error=1;
	} else {
		$pseudo = $_SESSION['profil'];
		if ($hashed_dbpass = retrieve_pass_from_pseudo($DB, $pseudo)) {

			/***** If actual password is the same that in database *****/
			if (password_verify($actual_password, $hashed_dbpass)) {
				$hashed_password = password_hash($pass_one, PASSWORD_DEFAULT);
				/***** If password updated successfully *****/
				if (update_password($DB, $hashed_password, $pseudo)) {
					#$message='<div class="form-group"> <div class="alert alert-success text-center fade in"> <a href="#" class="close" data-dismiss="alert">&times;</a>  Mot de passe change. </div> </div>';
					$_SESSION['msg'] ='<div class="form-group"> <div class="alert alert-success fade in"> <a href="#" class="close" data-dismiss="alert">&times;</a>  Votre mot de passe a été changé avec succès. Veuillez vous reconnecter.  </div> </div>';
					set_resetpass_token($DB, 'NULL', $pseudo);
					set_resetpass_expiration($DB, 'NULL', $pseudo);
					$error=0;
				}
			}
		}
	}
} else {
	echo "NO SUBMIT";
}

if ($error == 0) {
	session_destroy();
}

if (isset($message)) {
	$_SESSION['msg'] = $message;
}

header('location: '.$baseUrl.'/index.php?page=profil&profil='.$_SESSION['profil']);


?>
