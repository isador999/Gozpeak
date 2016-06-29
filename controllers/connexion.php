<?php
/******** Start, or continue Session *******/
session_start();

require_once('./lib/display.php');
require_once('./lib/check_strings.php');
require_once('../models/dbconnect.php');
require_once('../models/connexion_functions.php');
#require_once('../models/forgotpass_functions.php');


/********************* Function to check password and connect ********************/
function check_pass_and_connect ($DB, $login_pass, $login_user, $method) {
    $result_connect="";
    #echo "Active account : $active";

    /****** IF Account is Active ******/
    //if ($active == 1) {


	/****** Depending of Connection Method, retrieve hashed_dbpass ******/
    if($method == "email") {
    	$pseudo = select_pseudo($DB, $login_user);
    	$hashed_dbpass= retrieve_pass_from_pseudo($DB, $pseudo);
    	#$hashed_dbpass= retrieve_pass_from_email($DB, $login_user);
    	echo "Hash pass from DB : $hashed_dbpass";

    } else if ($method == "pseudo") {
      	$hashed_dbpass= retrieve_pass_from_pseudo($DB, $login_user);
	echo "Hash pass from DB : $hashed_dbpass";
    }


	/******** Finally check passwords **********/
    if (password_verify($login_pass, $hashed_dbpass)) {
 	$result_connect = "ok";
	echo "Yes password check successful ! ";
    } else {
	$result_connect = "nok";
	$error = "wrong_password";
	echo "NO, password check unsuccessful ! ";
    }


    #}else {
    #	$message='<div class="form-group"> <div class="alert alert-warning"> Votre compte Gozpeak n\'est pas encore actif, vous devez cliquer sur le lien d\'activation envoyé par email </div> </div>';
#	echo "Votre compte Gozpeak n'est pas encore actif";
#    }
    return ($result_connect);
}
//End of Function



/************ Checks for Login *************/
if($_POST){
    $login_user     = $_POST['userlogin'];
    $login_pass     = $_POST['passwordlogin'];

    #echo "$login_user";
    #echo "$login_pass";

    if($login_user == '' OR $login_pass == '') {
    #if(empty($login_user) OR empty($login_pass)) {
	echo "NOK: connection rule1";
	$error="empty_fields";
    }else if (strlen($login_user) < 6) {
	echo "NOK: connection rule2";
	$error="bad_length_user";
    } else {

	/********** If previous rules OK, check if pseudo/email exists *********/
	$nbre_mail = mail_exist($DB, $login_user);
	$nbre_pseudo = pseudo_exist($DB, $login_user);

    	if ($nbre_mail == 1) {
	    echo "OK: It seems that mail exists";
	    $method = "email";
      	    #$active = check_active_account_by_mail($DB, $login_user);
	    $result_connect = check_pass_and_connect($DB, $login_pass, $login_user, $method);
	    echo $result_connect;
    	} elseif ($nbre_pseudo == 1) {
	    echo "OK: It seems that pseudo exists";
	    $method = "pseudo";
	    #$active = check_active_account_by_pseudo($DB, $login_user);
	    $result_connect = check_pass_and_connect($DB, $login_pass, $login_user, $method);
	    echo $result_connect;
    	} else {
	    echo "NOK: It seems that nothing (mail|pseudo) exists in BDD";
    	}
    }
}



if($_POST) {
	if (isset($result_connect) && ($result_connect == "ok")) {
		if (isset($method)) { 
			if ($method == "email") {
				/***************** Provided login is an email *****************/
				/****** So retrieve associated pseudo + premium, etc...  ******/
                		$display_user = select_pseudo($DB, $login_user);
		 	}
		 	elseif ($method == "pseudo") {
				/***************** Provided login is a pseudo ******************/
				$display_user = $login_user;
                 		#$_SESSION['profil'] = $login_user;
			}
                }
		else {
			$error="connection_method_undefined";
		}

		$active = check_active_account_by_pseudo($DB, $display_user);
		if ($active == 1) {
			/*****  Set other session Variables *****/
			$_SESSION['profil'] = $display_user;
			$_SESSION['logged'] = 1;
			$_SESSION['premium'] = $premium;

			$premium = check_if_premium($DB, $display_user);
			if ($premium == 1) {
				$message='<div class="form-group"> <div class="alert alert-warning"> Les fonctionnatés Premium ne sont pas encore disponibles </div> <br> <div class="alert alert-success">Content de vous revoir ! '.$display_user.'</div> </div>';
			} else {	
				$message='<div class="form-group"> <div class="alert alert-success"> Content de vous revoir sur Gozpeak, '.$display_user.' ! </div> </div>';
			}
		} else {
			$message='<div class="form-group"> <div class="alert alert-warning"> Votre compte Gozpeak n\'est pas encore actif, vous devez cliquer sur le lien d\'activation envoyé par email </div> </div>';
        echo "Votre compte Gozpeak n'est pas encore actif";
		}

	/******* If result_connect NOK  (password is false), display Error *******/
	} elseif (isset($result_connect) && ($result_connect == "nok")) {
		 $message='<div class="form-group"> <div class="alert alert-danger"> Le mot de passe entré est incorrect </div> </div>';		
	}
}


/******** Set Messages depending error *******/
if (isset($error)) {
	if ($error == 'empty_fields') {
		$message='<div class="form-group"> <div class="alert alert-danger"> Veuillez remplir les champs obligatoires pour votre inscription </div> </div>';
	}
	elseif ($error == 'bad_length_user') {
		$message='<div class="form-group"> <div class="alert alert-danger"> L\'utilisateur de connexion est invalide </div> </div>';
	}
	elseif ($error == 'wrong_password') {
		$message='<div class="form-group"> <div class="alert alert-danger"> Le mot de passe entré est incorrect </div> </div>';
	}
	elseif ($error == 'connection_method_undefined') {
		$message='<div class="form-group"> <div class="alert alert-danger"> Une erreur est survenue lors de la connexion... <br> Veuillez réessayer ultérieurement </div> </div>';
	}
}


/******** Finally, set Global var if $message isset, and simply redirect to HOME *********/
if (isset($message)) {
	$_SESSION['msg'] = $message;
}
header('location: http://demo.gozpeak.com/index.php?page=home');


// IF A MEMBER HAS RESET HIS PASSWORD, RESET_PASS.PHP WILL SEND URL HERE AND THIS MESSAGE WILL BE DISPLAYED //
#$reinit = isset($_GET['reinit']) ? $_GET['reinit'] : '';
#$login = isset($_GET['login']) ? $_GET['login'] : '';

#if($reinit == 'ok') { 
#	my_echo ("4", "green", "Votre mot de passe a bien été changé,  Vous pouvez désormais vous connecter avec ce nouveau mot de passe ;-) ");
#}

?>

