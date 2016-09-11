<?php

session_start();
require_once('./lib/sessions_init.php');
require_once('./lib/check_login.php');
require_once('./lib/mailgun.php');
require_once('../models/dbconnect.php');
require_once('../models/eventidea_member_functions.php');


$logged = check_logged();
/****** Register in database if user logged ******/
if ($logged == 1) {
	if($_POST) {
		/***** Check eventname hidden field and select informations if OK *****/
		$eventname = isset($_POST['addmember-eventname']) ? $_POST['addmember-eventname'] : '';
		$pseudo_userlogged = isset($_SESSION['profil']) ? $_SESSION['profil'] : '';
	
		if(!empty($eventname) || (!empty($pseudo_userlogged))) {
			$infos_event = retrieve_event($DB, $eventname);
			
			/***** If date of event not expired *****/
			if(strtotime($infos_event['eventdatetime']) > strtotime($infos_event['NowDate'])) {
				$userid = retrieve_userid($DB, $pseudo_userlogged);

				/***** Register member-event association (only if not already registered) *****/
				if(!empty($infos_event['id']) || (!empty($userid))) {
					$eventid = $infos_event['id'];
					$eventuser_entries_before = check_eventuser_association($DB, $eventid, $userid);
					if($eventuser_entries_before < 1) {
						$data_eventusers = array($infos_event['id'], $userid);
						add_eventuser_association($DB, $data_eventusers);
						
       						/****** Check entries in database ******/ 
						$eventuser_entries = check_eventuser_association($DB, $eventid, $userid);

						if($eventuser_entries > 0) {
							/*********** Optionnaly send mail to user ********/
							/*********** This implies 'select mail' request *********/
							$message='<div class="form-group"> <div class="alert alert-success fade in"> <a href="#" class="close" data-dismiss="alert">&times;</a>  Votre inscription a l\'événement a bien été prise en compte ! </div> </div>';	
						} else {
							$message = '<div class="form-group"> <div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a> Une erreur est survenue lors de l\'inscription à l\'événement - second </div> </div>';
						}
					} else {
						$message = '<div class="form-group"> <div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a> Erreur, vous êtes déjà inscrit à cet événement </div> </div>';
					}
				} else {
					$message = '<div class="form-group"> <div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a> Une erreur est survenue lors de l\'inscription à l\'événement </div> </div>';
				}
			} else {
				$message = '<div class="form-group"> <div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a> Désolé, cet événement est terminé </div> </div>';
			}
		} else {
			$message = '<div class="form-group"> <div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a> Une erreur est survenue lors de l\'inscription à l\'événement </div> </div>';
		}
	} else {
		$message = '<div class="form-group"> <div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a> Une erreur est survenue lors de l\'inscription à l\'événement </div> </div>';
	}

} else {
	$message = '<div class="form-group"> <div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a> Vous devez être connecté pour vous inscrire à un événement </div> </div>';
}


if (isset($message)) {
        $_SESSION['msg'] = $message;
}

#header('location: '.$gozpeak_protocol.$gozpeak_host.'/index.php?page=home');
header('location: '.$gozpeak_protocol.$gozpeak_host.'/index.php?page=event&query='.$infos_event['eventtype'].'&event='.$eventname);


?>
