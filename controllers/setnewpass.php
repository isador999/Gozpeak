<?php

session_start();

require_once(LIB.'display.php');
require_once(LIB.'sessions_init.php');
require_once(MODELS.'dbconnect.php');
require_once(MODELS.'activation_functions.php');


/******** Controller to change your password (profile page) ********/

// IF ALL THE PREVIOUS CONDITIONS ARE OK (token, login, etc...), THE SCRIPT WILL LEAVE THE MESSAGES EMPTY, AND THE USER WILL TRY TO CHANGE HIS PASSWORD //
if(isset($_POST['submit'])) {
	$pass_one = isset($_POST['pass1']) ? $_POST['pass1'] : '';
	$pass_confirm = isset($_POST['pass2']) ? $_POST['pass2'] : '';
	
	if($pass_one == '' OR $pass_confirm == '') {
		//header('location: index.php?page=reset_pass&error=2');
		 my_echo ("4", "red", "Veuillez remplir tous les champs ! ");
	} elseif($pass_one != $pass_confirm) {
		//header('location: index.php?page=reset_pass&error=3');
		my_echo ("4", "red", "Les mots de passe saisis ne correspondent pas ! ");
	} elseif (strlen($pass_one) > 25 || strlen($pass_one) < 6) {
		//header('location: index.php?page=reset_pass&error=4');
		my_echo ("4", "red", "Le mot de passe doit etre compris entre 6 et 25 caracteres !");
	} else {
		$newpass = hash("sha1", "$pass_one");
		update_password($DB, $newpass, $login);
		set_resetpass_token($DB, 'NULL', $login);
		set_resetpass_expiration($DB, 'NULL', $login);
		my_echo ("4", "green", "Votre mot de passe a ete change avec succes !  Redirection vers la page de connexion ... ");
		header('Refresh: 4,url=index.php?page=connexion');
	}
}



$error = isset($_GET['error']) ? $_GET['error'] : '';
switch ($error) {
        case 1:
                my_echo ("4", "red", "Le lien fourni est invalide ou expiré... Vous allez etre redirige vers la page d'accueil. ");
                break;
        case 2:
                my_echo ("4", "red", "Veuillez remplir tous les champs de réinitialisation ! ");
                break;
        case 3:
                my_echo ("4", "red", "Les mots de passe saisis ne correspondent pas ! ");
		break;
	case 4:
		my_echo ("4", "red", "Le mot de passe doit etre compris entre 6 et 25 caracteres !");
        }


include_once('Views/reset_pass.php');
include_once('Views/footer.php');

?>




