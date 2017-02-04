<?php
session_start();

// Inscription Validation before saving in database //
require_once('./language.php');
require_once('./lib/sessions_init.php');
require_once('./lib/check_strings.php');
require_once('../models/dbconnect.php');
//require_once('../models/inscription_functions.php');
require_once('../models/profile_functions.php');
require_once('./lib/check_strings.php');


if($_POST) {
	$pseudo 	      	= isset($_POST['profile_pseudo']) ? $_POST['profile_pseudo'] : '';
  $lastname 	    	= isset($_POST['profile_lastname']) ? $_POST['profile_lastname'] : '';
  $firstname 	    	= isset($_POST['profile_firstname']) ? $_POST['profile_firstname'] : '';
	$email 		      	= isset($_POST['profile_mail']) ? $_POST['profile_mail'] : '';
  $nationality 			= isset($_POST['profile_nationality']) ? $_POST['profile_nationality'] : '';
  $birthdate   			= isset($_POST['profile_birthdate']) ? $_POST['profile_birthdate'] : '';
	$speakedlanguages = isset($_POST['profile_languages']) ? $_POST['profile_languages'] : '';

	foreach($_POST as $field) {
		echo $field;
	}


	if((trim($email) == '') OR (trim($pseudo) == '') OR (empty($pseudo)) OR (empty($email))) {
		$error="empty_fields";
		echo $error;

	} elseif((strlen($email) < 10) OR (!isEmail($email))) {
	  $error="invalid_email";
		echo $error;

	}

	$text_postfields = array($lastname, $firstname, $nationality, $speakedlanguages);
	foreach ($text_postfields as $field) {
		if(!preg_match("/^[a-zA-Z0-9éèàêç'+()\- ]+$/", $field)) {
			$error="notcompliant_fields";
			echo $error;
		}
	}

	/*************** Other checks ***************/
	/***** Count pseudo, count mail in DB *****/
	$nbre_pseudo = pseudo_exist($DB, $pseudo);
	$bdd_mail = select_mail($DB, $pseudo);

	if(($nbre_pseudo < 1) OR ($bdd_mail < 1))
	{
	  $error="pseudo_or_mail_dont_exists";
	}

/*	elseif (strlen($password) > 25 || strlen($password) < 8)
	{
	  echo "NOK: rule6";
	  $error="bad_length_pass";

	}
	elseif (ctype_alnum($password)) {
	  echo "NOK: rule7 - specialchars";
		$error="notcompliant_password";
	}
	elseif (!preg_match("/.*[0-9].*[0-9].*+/", $password) || !preg_match("/.*[A-Z].*+/", $password))  {
	        echo "NOK: rule7 - numbers and CAPS";
		$error="notcompliant_password";
	}
	elseif ($password != $password_check)
	{
	    echo "NOK: rule8";
	    $error="passwords_not_matching";
	}*/

	else {
   	/***** 'htmlentities function permit to esacpe/protect fields against attacks, like XSS *****/
    $pseudo = htmlspecialchars(trim($pseudo));
    $lastname = htmlspecialchars(trim($lastname));
    $firstname = htmlspecialchars(trim($firstname));
    $email = htmlspecialchars(trim($email));
    $nationality = htmlspecialchars(trim($nationality));
		$birthdate = htmlspecialchars(trim($birthdate));
    $speakedlanguages = htmlspecialchars(trim($speakedlanguages));

		//update_profile($DB, $pseudo, $email, $lastname, $name, $nationality, $birthdate, $speakedlanguages);
		//profile_update($DB, $pseudo, $email, $lastname, $firstname, $nationality, $birthdate, $speakedlanguages);
		profile_update($DB, $pseudo, $email, $lastname, $firstname, $nationality, $birthdate);

		/****** Check if update processed correctly ******/
    $nbre_mail = select_mail($DB, $pseudo);

		if($nbre_mail == 1) {
      echo "OK ! ";
      $message='<div class="form-group"> <div class="alert alert-success fade in"><a href="#" class="close" data-dismiss="alert">&times;</a> Vos informations de profil ont été validées !  </div> </div>';
			/*$mail_subject="Confirmation de votre inscription Gozpeak";
			$mail_content = '<html><body>';
			$mail_content .= '<h4>'."Bonjour $pseudo ! ".'</h4>'.'<br>'.'<br>';
			$mail_content .= "Merci de votre inscription sur Gozpeak :) ".'<br>';
			$mail_content .= "Afin de rendre votre compte actif, cliquez sur le lien suivant (valable pendant 72h)".'<br>';
			$mail_content .= "$gozpeak_protocol"."$gozpeak_host"."/index.php?page=activation&login=$pseudo&key=$key".'<br>'.'<br>';
			$mail_content .= "A très bientôt pour de nombreuses activités !".'<br>'.'<br>';
			$mail_content .= "Linguistiquement,".'<br>'.'<br>';
			$mail_content .= "L'équipe Gozpeak".'<br>';
			$mail_content .= '<img src="'."$gozpeak_protocol"."$gozpeak_host".'/views/images/gozpeak_small.png" alt="Gozpeak Logo">'.'<br>';
			$mail_content .= '</body> </html>';
	       		if(send_by_mailgun($mail, "$mail_subject", "$mail_content")) {
				$message='<div class="form-group"> <div class="alert alert-success text-center fade in"> <a href="#" class="close" data-dismiss="alert">&times;</a>Merci pour votre inscription sur Gozpeak ! Un email de confirmation vient de vous être envoyé ;) </div> </div>';
        */

				/******** Send Mail to Gozpeak Team ********/
				/*$team_mail_content = '<html><body>';
        $team_mail_content .= '<h4>'."Un nouveau membre inscrit sur Gozpeak ! ".'</h4>'.'<br>'.'<br>';
        $team_mail_content .= "Son pseudo : $pseudo".'<br>';
        $team_mail_content .= "Son adresse e-mail : $pseudo".'<br>';
        $team_mail_content .= "Cette personne devra activer son compte pour se connecter et s'inscrire aux activités".'<br>';
				send_by_mailgun('info@gozpeak.com', 'Nouvelle inscription [demo.gozpeak.com]', "$team_mail_content");
			} else {
				#$message = my_echo("3", "red", "'Désolé, une erreur est survenue lors de votre inscription'.'<br>'.'Veuillez réessayer ultérieurement'");
				$message='<div class="form-group"> <div class="alert alert-danger text-center fade in"><a href="#" class="close" data-dismiss="alert">&times;</a>  Désolé, une erreur est survenue lors de votre inscription.   Veuillez réessayer ultérieurement </div> </div>';
			}
      */

		/***** If register has not processed correctly *****/
		}
		else
		{
			echo "NOK";
			$message='<div class="form-group"> <div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a> Désolé, une erreur est survenue pendant l\'inscription. Veuillez réessayer ultérieurement. </div> </div>';
		}
  }
}


if (isset($error)) {
  if ($error == 'empty_fields') {
	  $message='<div class="form-group"> <div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a> Veuillez remplir les champs obligatoires pour votre inscription </div> </div>';
  } elseif ($error == 'pseudo_or_mail_dont_exists') {
		$message='<div class="form-group"> <div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a> Erreur : le pseudo et l\'adresse email sont bligatoires dans le formulaire </div> </div>';
  } elseif ($error == 'invalid_email') {
		$message='<div class="form-group"> <div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a> L\'adresse email est invalide </div> </div>';
  } elseif ($error == 'notcompliant_fields') {
		$message='<div class="form-group"> <div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a> Certains champs ne doivent pas contenir de caractères spéciaux </div> </div>';
	}
}

/******** Finally, set Global var if $message isset, and simply redirect to HOME *********/
if (isset($message)) {
	$_SESSION['msg'] = $message;
}

redirect_to_page($_GET['page']);

?>
