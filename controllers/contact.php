<?php


session_start();

// Inscription Validation before saving in database //
require_once('./language.php');
require_once('./lib/sessions_init.php');
require_once('./lib/check_strings.php');
require_once('./lib/mailgun.php');
require_once('../models/dbconnect.php');
require_once('../models/contact_functions.php');

$page = isset($_GET['page']) ? $_GET['page'] : '';

if($_POST){
	$contact_name 			= isset($_POST['contact_name']) ? $_POST['contact_name'] : '';
	$contact_email 			= isset($_POST['contact_email']) ? $_POST['contact_email'] : '';
	$contact_subject 		= isset($_POST['contact_subject']) ? $_POST['contact_subject'] : '';
	$contact_message 		= isset($_POST['contact_message']) ? $_POST['contact_message'] : '';
	$contact_captcha 		= isset($_POST['contact_captcha']) ? $_POST['contact_captcha'] : '';

	$contact_postfields = array($contact_name, $contact_email, $contact_subject, $contact_message, $contact_captcha);
	$contact_text_postfields = array($contact_name, $contact_subject, $contact_captcha);

	foreach ($contact_postfields as $field) {
		#echo $field;
		if((trim($field) == '') OR (empty($field))) {
			#echo "NOK: rule1";
			$error="empty_fields";
		}
	}

	//Check if special chars in name, subject, captcha
	foreach ($contact_text_postfields as $field) {
		if (preg_match("/.*[!@#$&*].*+/", $field)) {
			$error="unallowed_special_chars";
		}
	}

	// Check LengthName
	if (strlen($contact_name) < 4 OR strlen($contact_name) > 20) {
		echo $contact_name;
		echo (strlen($contact_name));
		$error="invalid_name";
	}

	//Check Email
	elseif(!isEmail($contact_email) OR strlen($contact_email) < 10 OR strlen($contact_email) > 70) {
		$error="invalid_email";
	}
	elseif (strlen($contact_subject) < 6 OR strlen($contact_subject) > 20 ) {
		$error="invalid_subject";
	}
	elseif (strlen($contact_message) < 15 OR strlen($contact_message) > 600 ) {
		$error="invalid_message";
	}

	//All fields seems valid
	if (!isset($error)) {
		$contact_name = htmlspecialchars(trim($contact_name));
    $contact_email = htmlspecialchars(trim($contact_email));
    $contact_subject = htmlspecialchars(trim($contact_subject));
		$contact_message = htmlspecialchars(trim($contact_message));
		$contact_captcha = htmlspecialchars(trim($contact_captcha));

		$contact_date = date('Y-m-d H:i:s');
		$contact_postfields = array($contact_name, $contact_email, $contact_subject, $contact_message, $contact_date);
		echo "Les donnees sont : ";
		echo var_dump($contact_postfields);
		if (register_contacts_stats($DB, $contact_postfields)) {
			echo "Registered in DB";
		}

		$contact_entry = check_contact_exists($DB, $contact_email, $contact_subject, $contact_date);
		echo "contact_entry est ".$contact_entry;

		if ($contact_entry > 0) {
			foreach ($contact_postfields as $field) {
				$field = urlencode($field);
			}

			//Send email
			$team_mail_content = '<html><body>';
			$team_mail_content .= '<h4>'."Nouveau message de contact".'</h4>'.'<br>'.'<br>';
			$team_mail_content .= "Votre message de contact a bien été pris en compte".'<br>'.'<br>';
			$team_mail_content .= "Voici le message posté : ".'<br>'.'<br>';
			$team_mail_content .= "Message posté par : ".$contact_name.'<br>';
			$team_mail_content .= "Avec l'adresse email  : ".$contact_email.'<br>';
			$team_mail_content .= "Object : ".$contact_subject.'<br>';
			$team_mail_content .= "Message : ".$contact_message.'<br>';
			$team_mail_content .= "Ces informations ont normalement été enregistrées en base de données ".'<br>';
			$team_mail_content .= '</body> </html>';
			if(send_by_mailgun('info@gozpeak.com', 'Nouveau message de contact [demo.gozpeak.com]', "$team_mail_content")) {
				$message='<div class="form-group"> <div class="alert alert-success fade in"><a href="#" class="close" data-dismiss="alert">&times;</a> Votre message a été envoyé avec succès ! <br> Votre demande sera prise en compte dès que possible </div> </div>';

				$mail_subject = "Contact de l'équipe Gozpeak";
				$mail_content = '<html><body>';
				$mail_content .= '<h4>'."Bonjour $contact_name ! ".'</h4>'.'<br>'.'<br>';
				$mail_content .= "Vous venez de contacter l'équipe Gozpeak, votre message de contact a bien été pris en compte".'<br>'.'<br>';
				$mail_content .= "Pour rappel, voici votre message : ".'<br>'.'<br>';
				$mail_content .= "Votre email : ".$contact_email.'<br>';
				$mail_content .= "Object : ".$contact_subject.'<br>';
				$mail_content .= "Message : ".$contact_message.'<br>';
				$mail_content .= "Linguistiquement,".'<br>'.'<br>';
				$mail_content .= "L'équipe Gozpeak".'<br>';
				$mail_content .= '<img src="'."$gozpeak_protocol"."$gozpeak_host".'/views/images/gozpeak_small.png" alt="Gozpeak Logo">'.'<br>';
				$mail_content .= '</body> </html>';
				send_by_mailgun($contact_email, "$mail_subject", "$mail_content");
			} else {
				$message='<div class="form-group"> <div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a>  Désolé, une erreur est survenue lors de l\'envoi du message de contact. <br>  Veuillez réessayer ultérieurement </div> </div>';
			}
			//Contact failed to be registered in DB
		} else {
			$message='<div class="form-group"> <div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a>  Désolé, une erreur est survenue lors de l\'envoi du message de contact. <br>  Veuillez réessayer ultérieurement </div> </div>';
		}
	}
}


if (isset($error)) {
  if ($error == 'empty_fields') {
		$message='<div class="form-group"> <div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a> Veuillez remplir tous les champs du formulaire de contact </div> </div>';
  } elseif ($error == 'unallowed_special_chars') {
		$message='<div class="form-group"> <div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a> Certains champs ne doivent pas contenir de caractères spéciaux </div> </div>';
  } elseif ($error == 'invalid_name') {
		$message='<div class="form-group"> <div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a> Le nom doit être compris entre 4 et 20 caratères </div> </div>';
	} elseif ($error == 'invalid_email') {
		$message='<div class="form-group"> <div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a> Votre adresse email de contact ne semble pas valide </div> </div>';
	} elseif ($error == 'invalid_subject') {
		$message='<div class="form-group"> <div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a> L\'objet de votre message doit être compris entre 6 et 20 caractères </div> </div>';
	} elseif ($error == 'invalid_message') {
		$message='<div class="form-group"> <div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a> Votre message de contact doit être compris entre 15 et 600 caractères </div> </div>';
	}
}

/******** Finally, set Global var if $message isset, and simply redirect to HOME *********/
if (isset($message)) {
	$_SESSION['msg'] = $message;
}

redirect_to_page($baseUrl, $page);

?>
