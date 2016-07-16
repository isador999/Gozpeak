<?php
/******** Start, or continue Session *******/
session_start();

require_once('./lib/display.php');
require_once('./lib/sessions_init.php');
require_once('./lib/check_strings.php');
require_once('./lib/generate_strings.php');
require_once('./lib/mailgun.php');
require_once('../models/forgotpass_functions.php');
require_once('../models/dbconnect.php');



if($_POST){
	$mail 	= isset($_POST['mail_forgotpass']) ? $_POST['mail_forgotpass'] : '';

	if(trim($mail) == '') {
		echo "NOK: rule1";
		$error="empy_fields";
	}
	else if((strlen($mail) < 10) OR (!isEmail($mail)))
	{
		echo "NOK: rule2";
		$error="invalid_email";
	}


	/******* Check mail in Database *******/
	$nbre_mail = mail_exist($DB, $mail);

	if($nbre_mail == 0)
        {
            echo "NOK: rule3";
            $error="non_existent_email";
        }
	else {
		/***** 'htmlentities function permit to escape/protect fields against attacks, like XSS *****/
                $mail = htmlspecialchars(trim($mail));

		#$key = md5(microtime(TRUE)*100000);
		/****** Register key in DB, (this way, when the user will click on reset link by mail, we can eventually check the key and delete it at the end. ******/

		$pseudo = select_pseudo($DB, $mail);
		if(empty($pseudo)) {
			echo "NOK: rule4";
			$error="pseudo_not_found";
		} else {
			$generatedtoken = getRandomString(12);
                	/***** URLENCODE TO CHANGE SPECIAL CHARS TO CODE *****/
                	$generatedtoken = urlencode($generatedtoken);
                	$pseudo = urlencode($pseudo); 



			$mail_subject="Gozpeak : Réinitialisation de mot de passe";
			$mail_content = '<html><body>';
			$mail_content .= '<h4>'."Bonjour $pseudo ! ".'</h4>'.'<br>'.'<br>';
			$mail_content .= "Ci-dessous un lien pour changer votre mot de passe Gozpeak :) ".'<br>';
			$mail_content .= "Ce lien n'est valide que pendant les prochaines 24h.".'<br>';
			$mail_content .= "$gozpeak_protocol"."$gozpeak_host"."/index.php?page=resetpass&token=$generatedtoken&login=$pseudo".'<br>'.'<br>';
			$mail_content .= "A bientôt sur Gozpeak !".'<br>'.'<br>';
			$mail_content .= "Linguistiquement,".'<br>'.'<br>';
			$mail_content .= '<img src="'."$gozpeak_protocol"."$gozpeak_host".'/views/images/gozpeak_small.png" alt="Gozpeak Logo">'.'<br>';	
			$mail_content .= '</body> </html>';
			if(send_by_mailgun($mail, "$mail_subject", "$mail_content")) {
				$message='<div class="form-group"> <div class="alert alert-success"> Un email vous a été envoyé pour réinitialiser votre mot de passe </div> </div>';
				set_resetpass_token($DB, $generatedtoken, $pseudo);
                		//$DTime = new DateTime();
                		//$DTime -> modify('+1 day');
                		//$DTime = date('Y-m-d H:i:s');
                		//$DTime = strtotime($DTime. ' + 1 days');
                		set_resetpass_expiration($DB, $pseudo);
			} else {
				$message = "'Désolé, une erreur est survenue '.'<br>'.'Veuillez réessayer ultérieurement'";
			}
		}
	}
}



if (isset($error)) {
        if ($error == 'empty_fields') {
                $message='<div class="form-group"> <div class="alert alert-danger"> Vous devez obligatoirement fournir votre email pour la récupération de mot de passe </div> </div>';
	}
	elseif ($error == 'invalid_email') {
                $message='<div class="form-group"> <div class="alert alert-danger"> Cette adresse email n\'est pas valide </div> </div>';
	}
	elseif ($error = 'non_existent_email') {
		$message='<div class="form-group"> <div class="alert alert-danger"> Cette adresse email n\'est pas enregistrée sur Gozpeak </div> </div>';
	}
	elseif ($error = 'pseudo_not_found') {
		$message='<div class="form-group"> <div class="alert alert-danger"> Un compte possédant cette adresse mail semble exister, mais aucun pseudonyme associé n\'a été trouvé</div> </div>';
	}
}


/***** Finally, set Global var if $message isset, and simply redirect to HOME *********/
if (isset($message)) {
        $_SESSION['msg'] = $message;
}

header('location: '.$gozpeak_protocol.$gozpeak_host.'/index.php?page=home');



/*************** OLD FUNCTIONS ******************/

/*if(isset($_POST['submit'])) {
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $pseudo = isset($_POST['pseudo']) ? $_POST['pseudo'] : '';
    if($email == '' OR $pseudo == '') {
        header('location: index.php?page=forgotpass&error=1');
    }else{
	require_once('models/dbconnect.php');
	require_once('models/connexion_functions.php');
        $nbre_mail = mail_exist($DB, $email);
        $nbre_pseudo = pseudo_exist($DB, $pseudo);
	if ($nbre_mail < 1 ) {
		header('location: index.php?page=forgotpass&error=2');
	} elseif ($nbre_pseudo < 1) {
		header('location: index.php?page=forgotpass&error=3');
	} else {
		require_once('lib/generate_strings.php');
		require_once('models/forgotpass_functions.php');
		$generatedtoken = getRandomString(12);
		//URLENCODE TO CHANGE SPECIAL CHARS TO CODE //
		$generatedtoken = urlencode($generatedtoken);
		$pseudo = urlencode($pseudo);
		mail("$email", "Reinitialisation de mot de passe", "Cher GoZpeaker $pseudo , Votre demande de reinitialisation de mot de passe a bien ete prise en compte.   Le lien suivant vous permettra de définir un nouveau mot de passe : https://gozpeak.no-ip.info/index.php?page=reset_pass&token=$generatedtoken&login=$pseudo

CE LIEN NE SERA VALIDE QUE POUR LES PROCHAINES 24H !

A bientot sur GoZpeak ! ");
		set_resetpass_token($DB, $generatedtoken, $pseudo);
		//$DTime = new DateTime();
		//$DTime -> modify('+1 day');
		//$DTime = date('Y-m-d H:i:s');
		//$DTime = strtotime($DTime. ' + 1 days');
		set_resetpass_expiration($DB, $pseudo);
		header('location: index.php?page=forgotpass&reinit=1');
	}
    }
}


include_once('Views/head.php');
include_once('Views/headband-notlogged.php');

$valid = isset($_GET['reinit']) ? $_GET['reinit'] : '';
if ($valid == 1) {
	my_echo ("4", "green", "Demande validee !  Un lien vous a ete envoye par email pour redefinir votre mot de passe. ");
}


$error = isset($_GET['error']) ? $_GET['error'] : '';

switch ($error) {
        case 1:
                my_echo ("4", "red", "Veuillez remplir tous les champs pour la récupération de mot de passe ");
                break;
        case 2:
                my_echo ("4", "red", "Cet e-mail n'existe pas ... ");
                break;
        case 3:
                my_echo ("4", "red", "Ce pseudonyme n'existe pas ... ");
        }


include_once('Views/forgotpass.php');
include_once('Views/footer.php');
*/


?>
