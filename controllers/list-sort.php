<?php

session_start();

// Sort events by languages //
require_once('./lib/display.php');
require_once('./lib/sessions_init.php');
require_once('../models/dbconnect.php');
require_once('../models/langsort_functions.php');


if($_POST){
	$query			= isset($_POST['query']) ? $_POST['query'] : '';
	$languages 		= isset($_POST['lang-sort']) ? $_POST['lang-sort'] : '';

	$mandatory_postfields = array($event_name, $event_place, $event_datetime, $lang, $langlevel, $query);
	$text_postfields = array($event_name, $event_place);


	/************ Foreach loops *************/
	foreach ($mandatory_postfields as $field) {
		echo $field;
		if((trim($field) == '') OR (empty($field))) {
			echo "NOK: rule1";
			$error="empty_fields";
		}
	}

	/********* Regexp : Check if special chars in fields ***********/
	foreach ($text_postfields as $field) {
		if(!preg_match("/^[a-zA-Z0-9éèàêç'+() ]+$/", $field)) {
			echo "$field nok: rule2";
			$error="notcompliant_fields";
		}
	}


	/************ Unitary tests ************/
	/***************************************/

	if(!isset($error)) {

		/*********** Check if pseudo of organizer exists ************/
		$nb_organizer = pseudo_exist($DB, $organizer);
		if($nb_organizer < 0) {
		    echo "NOK: rule3";
		    $error="unauthorized_postevent";
		}
		elseif((strlen($event_name) < 6) OR (strlen($event_name) > 25))
		{
		    echo "NOK: rule4";
		    $error="invalid_event_name";
		}
		elseif((strlen($event_place) < 6) OR (strlen($event_place) > 25))
		{
		    echo "NOK: rule5";
		    $error="invalid_event_place";
		}
		elseif(!strlen($event_datetime < 16) && (!strlen($event_datetime > 16)))
		{
		    $varleng = strlen($event_datetime);
		    echo "$varleng NOK: rule6";
		    $error="invalid_event_datetime";
		}
		#elseif((!preg_match("/^(0)[67](\s?\d{2}){4}$/", $phone_number))) {
		elseif (!empty($phone_number)) {
			if((!preg_match("/^0[0-9]{9}$/", $phone_number))) {
				echo "NOK: rule7";
				$error="invalid_phone_number";
			}
		}
		elseif(!preg_match("/^[a-zA-Zç]+$/", $lang)) {
			echo "nok: rule8";
			$error="invalid_lang";
		}
		elseif(!preg_match("/^[a-zA-Zé]+$/", $langlevel)) {
			echo "NOK: rule9";
			$error="invalid_langlevel";
		}
		elseif(!preg_match("/^(run|art|party|eat)$/", $query)) {
			echo "NOK: rule10";
			$error="invalid_query";
		}
        
        
		/*************** Other checks ***************/
		/***** Check if event_name already exists *****/
		$nb_event_name = idea_exist($DB, $event_name);
		if(!isset($error)) {
			if($nb_event_name > 0)
			{
			    echo "NOK: rule11";
			    $error="eventname_already_exists";
			} 
			else {


   				/***** 'htmlentities function permit to esacpe/protect fields against attacks, like XSS *****/
				$event_name = htmlspecialchars(trim($event_name));
				$event_place = htmlspecialchars(trim($event_place));
				$event_datetime = htmlspecialchars(trim($event_datetime));
				$phone_number = htmlspecialchars(trim($phone_number));
				$lang = htmlspecialchars(trim($lang));
				$langlevel = htmlspecialchars(trim($langlevel));
                                
				/***** Generate Activation Key *****/
				#$key = md5(microtime(TRUE)*100000);
				#$password = hash(sha1, $password);
				#$hashed_password = password_hash($password, PASSWORD_DEFAULT);
                                
				/***** Registering... *****/
				$postfields = array($organizer, $event_name, $event_place, $event_datetime, $phone_number, $lang, $langlevel, $query);
				add_idea($DB, $postfields);
                                
				/****** Check if register processed correctly ******/
				$nb_event_name = idea_exist($DB, $event_name);
				if(!$nb_event_name > 0) {
						$message='<div class="form-group"> <div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a>  Désolé, une erreur est survenue lors de l\'enregistrement de l`événement.  Veuillez réessayer ultérieurement </div> </div>';
                                
					/***** URLENCODE TO CHANGE SPECIAL CHARS TO CODE *****/
					/**** Change to use $_SESSION['profil'] $pseudo = urlencode($pseudo); *****/
                                
					/***** Futur envoi de mail *****/
					/***** $mail_subject="Ajout de votre événement ou activité Gozpeak";
					$mail_content = '<html><body>';
					$mail_content .= '<h4>'."Bonjour $pseudo ! ".'</h4>'.'<br>'.'<br>';
					$mail_content .= "Votre événement Gozpeak a bien été enregistré".'<br>';
					$mail_content .= "$gozpeak_protocol"."$gozpeak_host"."/index.php?page=activation&login=$pseudo&key=$key".'<br>'.'<br>';
					$mail_content .= "A très bientôt pour de nombreuses activités !".'<br>'.'<br>';
					$mail_content .= "Linguistiquement,".'<br>'.'<br>';
					$mail_content .= "L'équipe Gozpeak".'<br>';
					$mail_content .= '<img src="'."$gozpeak_protocol"."$gozpeak_host".'/views/images/gozpeak_small.png" alt="Gozpeak Logo">'.'<br>';
					$mail_content .= '</body> </html>';
	       	       	       		if(send_by_mailgun($mail, "$mail_subject", "$mail_content")) {
						$message='<div class="form-group"> <div class="alert alert-success fade in"> <a href="#" class="close" data-dismiss="alert">&times;</a>Merci pour votre inscription sur Gozpeak ! Un email de confirmation vient de vous être envoyé ;) </div> </div>';
					*****/
                                
						/******** Send Mail to Gozpeak Team ********/
						/***** $team_mail_content = '<html><body>';
                                        	$team_mail_content .= '<h4>'."Un nouveau membre inscrit sur Gozpeak ! ".'</h4>'.'<br>'.'<br>';
                                        	$team_mail_content .= "Son pseudo : $pseudo".'<br>';
                                        	$team_mail_content .= "Son adresse e-mail : $pseudo".'<br>';
                                        	$team_mail_content .= "Cette personne devra activer son compte pour se connecter et s'inscrire aux activités".'<br>';
						send_by_mailgun('info@gozpeak.com', 'Nouvelle inscription [demo.gozpeak.com]', "$team_mail_content");
					} else {
						$message='<div class="form-group"> <div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a>  Désolé, une erreur est survenue lors de votre inscription.   Veuillez réessayer ultérieurement </div> </div>';
					}
				******/
				/***** If register has not processed correctly *****/
				}
				else 
				{
					$message='<div class="form-group"> <div class="alert alert-success fade in"><a href="#" class="close" data-dismiss="alert">&times;</a> Votre idée d\'événement a été enregistré avec succès ! </div> </div>';
				}
			}
		}
        }
}



if (isset($error)) {
        if ($error == 'empty_fields') {
		$message='<div class="form-group"> <div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a> Veuillez remplir les champs obligatoires pour proposer votre événement </div> </div>';
                #my_echo ("3", "red", "Veuillez remplir les champs obligatoires pour votre inscription");
        }
        elseif ($error == 'notcompliant_fields') {
		$message='<div class="form-group"> <div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a> Certains caractères spéciaux sont interdits pour les noms et lieux d\événement </div> </div>';
                #my_echo ("3", "red", "Veuillez remplir les champs obligatoires pour votre inscription");
        }
        elseif ($error == 'unauthorized_postevent') {
		$message='<div class="form-group"> <div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a> Vous n\'êtes pas autorisé à poster un événement. Vérifiez que vous êtes connecté. </div> </div>';
                #my_echo ("3", "red", "Veuillez remplir les champs obligatoires pour votre inscription");
        }
        elseif ($error == 'invalid_event_name') {
		$message='<div class="form-group"> <div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a> Le nom de l\'événement doit être compris entre 6 et 15 caractères </div> </div>';
                #my_echo ("3", "red", "Veuillez remplir les champs obligatoires pour votre inscription");
        }
        elseif ($error == 'invalid_event_place') {
		$message='<div class="form-group"> <div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a> Le lieu de l\'événement doit être compris entre 6 et 20 caractères </div> </div>';
                #my_echo ("3", "red", "Veuillez remplir les champs obligatoires pour votre inscription");
        }
        elseif ($error == 'invalid_event_datetime') {
		$message='<div class="form-group"> <div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a> La date de l\'événement n\'est pas valide </div> </div>';
                #my_echo ("3", "red", "Veuillez remplir les champs obligatoires pour votre inscription");
        }
        elseif ($error == 'invalid_phone_number') {
		$message='<div class="form-group"> <div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a> Le numéro de téléphone entré n\'est pas valide </div> </div>';
                #my_echo ("3", "red", "Veuillez remplir les champs obligatoires pour votre inscription");
        }
        elseif ($error == 'invalid_lang') {
		$message='<div class="form-group"> <div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a> La langue choisie est invalide ou n\'existe pas </div> </div>';
                #my_echo ("3", "red", "Veuillez remplir les champs obligatoires pour votre inscription");
        }
        elseif ($error == 'invalid_langlevel') {
		$message='<div class="form-group"> <div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a> Le niveau de langue choisie est invalide </div> </div>';
                #my_echo ("3", "red", "Veuillez remplir les champs obligatoires pour votre inscription");
        }
        elseif ($error == 'invalid_langlevel') {
		$message='<div class="form-group"> <div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a> Le niveau de langue choisie est invalide </div> </div>';
                #my_echo ("3", "red", "Veuillez remplir les champs obligatoires pour votre inscription");
        }
        elseif ($error == 'invalid_query') {
		$message='<div class="form-group"> <div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a> La catégorie sélectionnée n\'est pas valide </div> </div>';
                #my_echo ("3", "red", "Veuillez remplir les champs obligatoires pour votre inscription");
        }
        elseif ($error == 'eventname_already_exists') {
		$message='<div class="form-group"> <div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a> Désolé, un événement du même nom existe déjà </div> </div>';
                #my_echo ("3", "red", "Le pseudo que vous avez choisi existe deja ! ");
        }
}


/******** Finally, set Global var if $message isset, and simply redirect to HOME *********/
if (isset($message)) {
	$_SESSION['msg'] = $message;
}

header('location: '.$gozpeak_protocol.$gozpeak_host.'/index.php?page=home');

?>

