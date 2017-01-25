<?php

session_start();

require_once 'classes/Autoloader.php';

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


	Autoloader::register();

	$event = new Event($event_name, $event_place, $query, $lang, $event_desc, $organizer, $event_datetime, $langlevel, $phone_number);
	$db = new Database('gozpeak_dev');

	// var_dump($db);
	// echo "<br>";
	// echo "<br>";
	// echo "<br>";

	//$member = $db->query("SELECT COUNT(pseudo) FROM members where pseudo = 'test'");

	//If member does not exists;


	try {
		$event->validate_fields();
		$event->check_select_values();
		$db->check_Ideaname($event_name);
		$db->retrieveMember($organizer);
		//$event_params = get_object_vars($event);
		$event_params = array($event_name, $event_place, $query, $lang, $event_desc, $organizer, $event_datetime, $langlevel, $phone_number);
		$db->registerIdea($event_params);
		//$db->registerIdea(array(get_object_vars($event)));
	}catch(LengthException $e) {
		echo "Erreur de taille : " . $e->getMessage();
		//$message="La longueur des champs n'est pas valide";
	} catch(UnexpectedValueException $e) {
		echo "Valeurs incorrectes : " . $e->getMessage();
		//$message="Certains champs ne doivent pas contenir de caractères spéciaux";
	}catch(OutOfBoundsException $e) {
		echo "Valeurs non autorisées : " . $e->getMessage();
		//$message="Valeurs incorrectes lors de l'envoi des données";
	} catch(LogicException $e) {
		echo "Erreur fonctionnelle : " . $e->getMessage();
		//$message="Vous n'êtes pas autorisé à poster un événement. ";
	}

	//$member = $db->query("SELECT COUNT(pseudo) FROM members where pseudo = '$event->organizer'");


	//var_dump($event->message);
	//Puis enregistrer en BDD l'événement.
	//var_dump($event->message);
	//$results= $db->query('SELECT * from events');
}


	/************ Foreach loops *************/
	// foreach ($mandatory_postfields as $field) {
	// 	#echo $field;
	// 	if((trim($field) == '') OR (empty($field))) {
	// 		#echo "NOK: rule1";
	// 		$error="empty_fields";
	// 	}
	// }

	/********* Regexp : Check if special chars in fields ***********/
	// foreach ($text_postfields as $field) {
	// 	if(!preg_match("/^[a-zA-Z0-9éèàêç'+()\- ]+$/", $field)) {
	// 		#echo "$field nok: rule2";
	// 		$error="notcompliant_fields";
	// 	}
	// }


	/************ Unitary tests ************/
	/***************************************/

// 	if(!isset($error)) {
// 		/*********** Check if pseudo of organizer exists ************/
// 		$nb_organizer = pseudo_exist($DB, $organizer);
//
// 		if($nb_organizer < 0) {
// 		  #echo "NOK: rule3";
// 		  $error="unauthorized_postevent";
// 		}
// 		elseif((strlen($event_name) < 6) OR (strlen($event_name) > 25))
// 		{
// 		  #echo "NOK: rule4";
// 		  $error="invalid_event_name";
// 		}
// 		elseif((strlen($event_place) < 6) OR (strlen($event_place) > 25))
// 		{
// 		  #echo "NOK: rule5";
// 		  $error="invalid_event_place";
// 		}
// 		elseif((strlen($event_desc) < 5) OR (strlen($event_desc) > 300))
// 		{
// 			$error="invalid_event_desc";
// 		}
// 		elseif(!strlen($event_datetime < 16) && (!strlen($event_datetime > 16)))
// 		{
// 		  $varleng = strlen($event_datetime);
// 		  #echo "$varleng NOK: rule6";
// 		  $error="invalid_event_datetime";
// 		}
// 		elseif (!empty($phone_number)) {
// 			if((!preg_match("/^0[0-9]{9}$/", $phone_number))) {
// 				#echo "NOK: rule7";
// 				$error="invalid_phone_number";
// 			}
// 		}
// 		elseif(!preg_match("/^(anglais|espagnol|italien|français|portugais|breton|autre)$/", $lang)) {
// 			#echo "nok: rule8";
// 			$error="invalid_lang";
// 		}
// 		elseif(!preg_match("/^(Débutant|Intermédiaire|Avancé)$/", $langlevel)) {
// 			#echo "NOK: rule9";
// 			$error="invalid_langlevel";
// 		}
// 		elseif(!preg_match("/^(run|art|party|eat)$/", $query)) {
// 			#echo "NOK: rule10";
// 			$error="invalid_query";
// 		}
//
//
// 		/*************** Other checks ***************/
// 		/***** Check if event_name already exists *****/
// 		$nb_event_name = idea_exist($DB, $event_name);
// 		if(!isset($error)) {
// 			if($nb_event_name > 0)
// 			{
// 			    #echo "NOK: rule11";
// 			    $error="eventname_already_exists";
// 			}
// 			else {
//    				/***** 'htmlentities function permit to esacpe/protect fields against attacks, like XSS *****/
// 				$event_name = htmlspecialchars(trim($event_name));
// 				$event_place = htmlspecialchars(trim($event_place));
// 				$event_desc = htmlspecialchars(trim($event_desc));
// 				$event_datetime = htmlspecialchars(trim($event_datetime));
// 				$phone_number = htmlspecialchars(trim($phone_number));
// 				$lang = htmlspecialchars(trim($lang));
// 				$langlevel = htmlspecialchars(trim($langlevel));
//
// 				/***** Generate Activation Key *****/
// 				#$key = md5(microtime(TRUE)*100000);
// 				#$password = hash(sha1, $password);
// 				#$hashed_password = password_hash($password, PASSWORD_DEFAULT);
//
// 				/***** Registering... *****/
// 				$postfields = array($organizer, $event_name, $event_place, $event_desc, $event_datetime, $phone_number, $lang, $langlevel, $query);
// 				add_idea($DB, $postfields);
//
// 				/****** Check if register processed correctly ******/
// 				$nb_event_name = idea_exist($DB, $event_name);
// 				if($nb_event_name > 0) {
// 					/***** URLENCODE TO CHANGE SPECIAL CHARS TO CODE *****/
// 					/**** Change to use $_SESSION['profil'] $pseudo = urlencode($pseudo); *****/
// 					$event_name = urlencode($event_name);
// 					$mail_organizer = get_mail_organizer($DB, $organizer);
//
// 					$mail_subject="Ajout d'événement Gozpeak";
// 					$mail_content = '<html><body>';
// 					$mail_content .= '<h4>'."Bonjour $organizer ! ".'</h4>'.'<br>'.'<br>';
// 					$mail_content .= "Votre idée d'événement Gozpeak a bien été enregistrée".'<br>';
// 					$mail_content .= "Vous pouvez la retrouver en cliquant sur le lien ci-dessous : ".'<br>';
// 					$mail_content .= "$gozpeak_protocol"."$gozpeak_host"."/index.php?page=idea&idea=$event_name".'<br>'.'<br>';
// 					$mail_content .= "Les membres ayant un compte actif peuvent désormais s'inscrire à votre sortie".'<br>';
// 					$mail_content .= "En espérant que vous ayez de nombreux inscrits !".'<br>'.'<br>';
// 					$mail_content .= "Linguistiquement,".'<br>'.'<br>';
// 					$mail_content .= "L'équipe Gozpeak".'<br>';
// 					$mail_content .= '<img src="'."$gozpeak_protocol"."$gozpeak_host".'/views/images/gozpeak_small.png" alt="Gozpeak Logo">'.'<br>';
// 					$mail_content .= '</body> </html>';
// 	       	if(send_by_mailgun($mail_organizer, "$mail_subject", "$mail_content")) {
// 						$message='<div class="form-group"> <div class="alert alert-success fade in"><a href="#" class="close" data-dismiss="alert">&times;</a> Votre idée d\'événement a été enregistré avec succès ! </div> </div>';
// 						/******** Send Mail to Gozpeak Team ********/
// 						/***** $team_mail_content = '<html><body>'; *****/
//             $team_mail_content = '<h4>'."Nouvelle idée postée - $query ! ".'</h4>'.'<br>'.'<br>';
//             $team_mail_content .= "L'organisateur : $organizer".'<br>';
//             $team_mail_content .= "Téléphone (peut être vide) : $phone_number".'<br>'.'<br>';
//             $team_mail_content .= "Le nom de l'idée postée : $event_name".'<br>'.'<br>';
//             $team_mail_content .= "Description de l'idée : $event_desc".'<br>'.'<br>';
//             $team_mail_content .= "Langue / Niveau souhaités : $lang niveau $langlevel".'<br>';
//             $team_mail_content .= "Les personnes ayant un compte actif peuvent désormais s'inscrire à cette sortie".'<br>';
// 						send_by_mailgun('info@gozpeak.com', 'Nouvelle idée postée [demo.gozpeak.com]', "$team_mail_content");
// 					} else {
// 						$message='<div class="form-group"> <div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a>  Désolé, une erreur est survenue lors de votre inscription.   Veuillez réessayer ultérieurement </div> </div>';
// 					}
// 				/***** If register has not processed correctly *****/
// 				}
// 				else
// 				{
// 					$message='<div class="form-group"> <div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a>  Désolé, une erreur est survenue lors de l\'enregistrement de l`événement.  Veuillez réessayer ultérieurement . Test nb_event_name failed </div> </div>'.$nb_event_name;
// 				}
// 			}
// 		}
//   }
// }
//
//
// if (isset($error)) {
//   if ($error == 'empty_fields') {
// 		$message='<div class="form-group"> <div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a> Veuillez remplir les champs obligatoires pour proposer votre événement </div> </div>';
//   } elseif ($error == 'notcompliant_fields') {
// 		$message='<div class="form-group"> <div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a> Certains caractères spéciaux sont interdits pour les noms et lieux d\'événement </div> </div>';
//   } elseif ($error == 'unauthorized_postevent') {
// 		$message='<div class="form-group"> <div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a> Vous n\'êtes pas autorisé à poster un événement. Vérifiez que vous êtes connecté. </div> </div>';
//   } elseif ($error == 'invalid_event_name') {
// 		$message='<div class="form-group"> <div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a> Le nom de l\'événement doit être compris entre 6 et 15 caractères </div> </div>';
//   } elseif ($error == 'invalid_event_place') {
// 		$message='<div class="form-group"> <div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a> Le lieu de l\'événement doit être compris entre 6 et 20 caractères </div> </div>';
//   } elseif ($error == 'invalid_event_datetime') {
// 		$message='<div class="form-group"> <div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a> La date de l\'événement n\'est pas valide </div> </div>';
//   } elseif ($error == 'invalid_phone_number') {
// 		$message='<div class="form-group"> <div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a> Le numéro de téléphone entré n\'est pas valide </div> </div>';
//   } elseif ($error == 'invalid_lang') {
// 		$message='<div class="form-group"> <div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a> La langue choisie est invalide ou n\'existe pas </div> </div>';
//   } elseif ($error == 'invalid_langlevel') {
// 		$message='<div class="form-group"> <div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a> Le niveau de langue choisie est invalide </div> </div>';
//   } elseif ($error == 'invalid_langlevel') {
// 		$message='<div class="form-group"> <div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a> Le niveau de langue choisie est invalide </div> </div>';
//   } elseif ($error == 'invalid_query') {
// 		$message='<div class="form-group"> <div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a> La catégorie sélectionnée n\'est pas valide </div> </div>';
//   } elseif ($error == 'eventname_already_exists') {
// 		$message='<div class="form-group"> <div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a> Désolé, un événement du même nom existe déjà </div> </div>';
//   }
// }

/******** Finally, set Global var if $message isset, and simply redirect to HOME *********/
// if (isset($message)) {
// 	$_SESSION['msg'] = $message;
// }
//
// redirect_to_page($baseUrl, $page);

?>
