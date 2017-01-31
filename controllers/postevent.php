<?php

session_start();

// Postevent Validation before saving in database //
require_once('./language.php');
require_once('./lib/sessions_init.php');
require_once('./lib/check_login.php');
require_once('./lib/mailgun.php');
require_once('../models/dbconnect.php');
require_once('../models/postevent_functions.php');

$page = isset($_GET['page']) ? $_GET['page'] : '';

if($_POST) {
	$organizer 				= isset($_SESSION['profil']) ? $_SESSION['profil'] : '';
	$event_name 			= isset($_POST['event_name']) ? $_POST['event_name'] : '';
	$event_place 			= isset($_POST['event_place']) ? $_POST['event_place'] : '';
	$event_desc 			= isset($_POST['event_desc']) ? $_POST['event_desc'] : '';
	$event_datetime 	= isset($_POST['event_datetime']) ? $_POST['event_datetime'] : '';
	$phone_number 		= isset($_POST['event_phonenumber']) ? $_POST['event_phonenumber'] : '';
	$lang 						= isset($_POST['lang']) ? $_POST['lang'] : '';
	$langlevel 				= isset($_POST['langlevel']) ? $_POST['langlevel'] : '';
	$query						= isset($_POST['query']) ? $_POST['query'] : '';

	$source						= isset($_POST['source']) ? $_POST['source'] : '';

	//Field specific to eventedit case
	$old_event_name = isset($_POST['old_event_name']) ? $_POST['old_event_name'] : '';

	if($source == 'newevent') {
		$mandatory_postfields = array($event_name, $event_place, $event_desc, $event_datetime, $lang, $langlevel, $query, $source);
		$text_postfields = array($event_name, $event_place, $query, $source);
	} elseif ($source == 'eventedit') {
		$mandatory_postfields = array($event_name, $event_place, $event_desc, $event_datetime, $lang, $langlevel, $query, $source, $old_event_name);
		$text_postfields = array($event_name, $event_place, $query, $source, $old_event_name);
	}

	/************ Foreach loops *************/
	foreach ($mandatory_postfields as $field) {
		#echo $field;
		if((trim($field) == '') OR (empty($field))) {
			#echo "NOK: rule1";
			$error="empty_fields";
		}
	}

	/********* Regexp : Check if special chars in fields ***********/
	foreach ($text_postfields as $field) {
		if(!preg_match("/^[a-zA-Z0-9éèàêç'+()\- ]+$/", $field)) {
			//echo "- Validation compliance :  " . $field . ". <br>";
			$error="notcompliant_fields";
		}
	}


	/************ Unitary tests ************/
	/***************************************/
	if(!isset($error)) {
		/*********** Check if pseudo of organizer exists ************/
		$nb_organizer = pseudo_exist($DB, $organizer);

		if($nb_organizer < 0) {
		  #echo "NOK: rule3";
		  $error="unauthorized_case";
		}
		elseif((strlen($event_name) < 6) OR (strlen($event_name) > 25))
		{
		  #echo "NOK: rule4";
		  $error="invalid_event_name";
		}
		elseif((strlen($event_place) < 6) OR (strlen($event_place) > 25))
		{
		  #echo "NOK: rule5";
		  $error="invalid_event_place";
		}
		elseif((strlen($event_desc) < 5) OR (strlen($event_desc) > 300))
		{
			$error="invalid_event_desc";
		}
		elseif(!strlen($event_datetime < 16) && (!strlen($event_datetime > 16)))
		{
		  $varleng = strlen($event_datetime);
		  #echo "$varleng NOK: rule6";
		  $error="invalid_event_datetime";
		}
		elseif (!empty($phone_number)) {
			if((!preg_match("/^0[0-9]{9}$/", $phone_number))) {
				#echo "NOK: rule7";
				$error="invalid_phone_number";
			}
		}
		elseif(!preg_match("/^(english|spanish|italian|french|multilanguages)$/", $lang)) {
			#echo "nok: rule8";
			$error="invalid_lang";
		}
		elseif(!preg_match("/^(beginner|middle|advanced)$/", $langlevel)) {
			#echo "NOK: rule9";
			$error="invalid_langlevel";
		}
		elseif(!preg_match("/^(run|art|party|eat)$/", $query)) {
			#echo "NOK: rule10";
			$error="invalid_query";
		}
		elseif(!preg_match("/^(newevent|eventedit)/", $source)) {
			$error="unauthorized_case";
		}

		/*************** Other checks ***************/
		/***** 'htmlentities function permit to escape/protect fields against attacks, like XSS *****/
		$event_name = htmlspecialchars(trim($event_name));
		$event_place = htmlspecialchars(trim($event_place));
		$event_desc = htmlspecialchars(trim($event_desc));
		$event_datetime = htmlspecialchars(trim($event_datetime));
		$phone_number = htmlspecialchars(trim($phone_number));
		$lang = htmlspecialchars(trim($lang));
		$langlevel = htmlspecialchars(trim($langlevel));

		/***** Registering... *****/

		// $update_postfields = array("organizer"=>"$organizer",
		// 													 "ideaplace"=>$event_place,
		// 													 "ideadesc"=>$event_desc,
		// 													 "ideadatetime"=>$event_datetime,
		// 												 	 "ideaphone"=>$phone_number,
		// 												 	 "language"=>$lang,
		// 												   "level_language"=>$langlevel,
		// 												   "ideatype"=>$query,
		// 												   "ideaname"=>$event_name);

		/***** Check if event_name already exists *****/

		if(!isset($error)) {
			$nb_event_name = idea_exist($DB, $event_name);
			if ($source == 'newevent') {


				//Check if event already exists
				if ($nb_event_name > 0)
				{
					$error="eventname_already_exists";
				}	else {
					$postfields = array($organizer, $event_name, $event_place, $event_desc, $event_datetime, $phone_number, $lang, $langlevel, $query);
					// foreach ($postfields as $field) {
					// 	echo "- Array to send (postevent) :  " . $field . ". <br>";
					// }

					add_idea($DB, $postfields);
				}

			//Event Edition Case
			} elseif ($source == 'eventedit') {
				$nb_event_name = idea_exist($DB, $old_event_name);
				if ($nb_event_name < 1) {
					$error="not_existant_eventname";
				} else {
					//$go_event_edition = 1;
					$idea_id = get_idea_id($DB, $old_event_name);

					if(!empty($idea_id)) {
						//$update_fields = array($organizer, $event_name, $event_place, $event_desc, $event_datetime, $phone_number, $lang, $langlevel, $query, $idea_id);
						update_existant_idea($DB, $organizer, $event_name, $event_place, $event_desc, $event_datetime, $phone_number, $lang, $langlevel, $query, $idea_id);
					} else {
						$error="update_existant_idea_failed";
					}
				}
			}

			/****** Check if register processed correctly ******/
			$nb_event_name = idea_exist($DB, $event_name);
			if($nb_event_name > 0) {
				/***** URLENCODE TO CHANGE SPECIAL CHARS TO CODE *****/
				/**** Change to use $_SESSION['profil'] $pseudo = urlencode($pseudo); *****/

				switch ($source) {
					case "newevent":
						$mail_subject = "Gozpeak : Votre idée a été validée";
						$team_mail_subject = "Nouvelle idée postée [demo.gozpeak.com]";
						break;
					case "eventedit":
						$mail_subject = "Gozpeak : Modification de votre idée d'événement";
						$team_mail_subject = "Modification d'une idée [demo.gozpeak.com]";
						break;
					default:
						die();
				}

				$event_name_for_link = urlencode($event_name);
				$mail_organizer = get_mail_organizer($DB, $organizer);

				//$mail_subject = "Ajout d'événement Gozpeak";
				$mail_content = '<html> <body>';
				$mail_content .= '<h4>' . "Bonjour $organizer ! " . '</h4>' . '<br>' . '<br>';
				$mail_content .= '<strong>' . "Votre idée d'événement Gozpeak a bien été enregistrée" . '</strong>' . '<br>';
				$mail_content .= "Vous pouvez la retrouver en cliquant sur le lien ci-dessous :  " . '<br>';
				$mail_content .= '<a href="' . $baseUrl . '/index.php?page=idea&query=' . $query . '&idea=' . $event_name_for_link . '">' . $event_name . '</a>' . '<br>' . '<br>';
				$mail_content .= "Les membres ayant un compte actif peuvent désormais s'inscrire à votre sortie" . '<br>';
				$mail_content .= "En espérant que vous ayez de nombreux inscrits !" . '<br>' . '<br>';
				$mail_content .= "Linguistiquement," . '<br>' . '<br>';
				$mail_content .= "L'équipe Gozpeak" . '<br>';
				$mail_content .= '<img src="' . $baseUrl . '/views/images/gozpeak_small.png" alt="Gozpeak Logo">' . '<br>';
				$mail_content .= '</body> </html>';
	      if(send_by_mailgun($mail_organizer, $mail_subject, $mail_content)) {
					$message='<div class="form-group"> <div class="alert alert-success fade in"><a href="#" class="close" data-dismiss="alert">&times;</a> Votre idée d\'événement a été enregistré avec succès ! </div> </div>';

					/******** Send Mail to Gozpeak Team ********/
					/***** $team_mail_content = '<html><body>'; *****/
					$team_mail_content = "<html> <body>";
          $team_mail_content .= '<h4>' . "Nouvelle idée postée - $query ! " . '</h4>' . '<br>' . '<br>';
          $team_mail_content .= "L'organisateur : " . '<strong>' . $organizer . '</strong>' . '<br>';
          $team_mail_content .= "Téléphone (peut être vide) : " . '<strong>' . $phone_number . '</strong>' . '<br>' . '<br>';
          $team_mail_content .= "Le nom de l'idée postée : " . '<strong>' . $event_name . '</strong>' . '<br>' . '<br>';
					$team_mail_content .= "Description de l'idée : " . '<br>' . '<strong>' . $event_desc . '</strong>' . '<br>' . '<br>';
          $team_mail_content .= "Le lien vers l'idée :  " . '<a href="' . $baseUrl . '/index.php?page=idea&query=' . $query . '&idea=' . $event_name_for_link . '">' . $event_name . '</a>' . '<br>' . '<br>';
          $team_mail_content .= "Langue / Niveau souhaités : " . '<strong>' . " $lang niveau $langlevel" . '</strong>' . '<br>';
          $team_mail_content .= "Les personnes ayant un compte actif peuvent s'inscrire à cette sortie" . '<br>' . '<br>';
					$team_mail_content .= '<img src="' . $baseUrl . '/views/images/gozpeak_small.png" alt="Gozpeak Logo">' . '<br>';
					$team_mail_content .= "<html> <body>";
					send_by_mailgun('info@gozpeak.com', $team_mail_subject, $team_mail_content);
				} else {
					$message='<div class="form-group"> <div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a>  Désolé, une erreur est survenue lors de votre inscription.   Veuillez réessayer ultérieurement </div> </div>';
				}

				/***** If register has not processed correctly *****/
			}
			else
			{
				$message='<div class="form-group"> <div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a>  Désolé, une erreur est survenue lors de l\'enregistrement de l`événement.  Veuillez réessayer ultérieurement . Test nb_event_name failed </div> </div>';
			}
		} //End if not set error
	} //End if not set error - at Unitary tests
} //End of if $_POST.



if (isset($error)) {
  if ($error == 'empty_fields') {
		$message='<div class="form-group"> <div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a> Veuillez remplir les champs obligatoires pour proposer votre événement </div> </div>';
  } elseif ($error == 'notcompliant_fields') {
		$message='<div class="form-group"> <div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a> Certains caractères spéciaux sont interdits pour les noms et lieux d\'événement  ' . $source . "  " .  $query . " " . $old_event_name . "  " .  '</div> </div>';
  } elseif ($error == 'unauthorized_case') {
		$message='<div class="form-group"> <div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a> Vous n\'êtes pas autorisé à poster ou modifier d\'événement. Vérifiez que vous êtes connecté. </div> </div>';
  } elseif ($error == 'invalid_event_name') {
		$message='<div class="form-group"> <div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a> Le nom de l\'événement doit être compris entre 6 et 15 caractères </div> </div>';
  } elseif ($error == 'invalid_event_place') {
		$message='<div class="form-group"> <div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a> Le lieu de l\'événement doit être compris entre 6 et 20 caractères </div> </div>';
  } elseif ($error == 'invalid_event_datetime') {
		$message='<div class="form-group"> <div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a> La date de l\'événement n\'est pas valide </div> </div>';
  } elseif ($error == 'invalid_phone_number') {
		$message='<div class="form-group"> <div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a> Le numéro de téléphone entré n\'est pas valide </div> </div>';
  } elseif ($error == 'invalid_lang') {
		$message='<div class="form-group"> <div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a> La langue choisie est invalide ou n\'existe pas </div> </div>';
  } elseif ($error == 'invalid_langlevel') {
		$message='<div class="form-group"> <div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a> Le niveau de langue choisie est invalide </div> </div>';
  } elseif ($error == 'invalid_langlevel') {
		$message='<div class="form-group"> <div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a> Le niveau de langue choisie est invalide </div> </div>';
  } elseif ($error == 'invalid_query') {
		$message='<div class="form-group"> <div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a> La catégorie sélectionnée n\'est pas valide </div> </div>';
  } elseif ($error == 'eventname_already_exists') {
		$message='<div class="form-group"> <div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a> Désolé, un événement du même nom existe déjà </div> </div>';
  } elseif($error == 'not_existant_eventname') {
		$message='<div class="form-group"> <div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a> Désolé, l\'événement concerné est introuvable. Veuillez réessayer ultérieurement </div> </div>';
	}  elseif ($error == 'registerDB_failed') {
		$message='<div class="form-group"> <div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a> Désolé, une erreur est survenue lors de l\'enregistrement de l`événement.  Veuillez réessayer ultérieurement </div> </div>';
	}

}


/******** Finally, set Global var if $message isset, and simply redirect to HOME *********/
if (isset($message)) {
	$_SESSION['msg'] = $message;
}

redirect_to_page($baseUrl, $page);

?>
