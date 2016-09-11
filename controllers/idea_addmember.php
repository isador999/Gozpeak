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
		/***** Check ideaname hidden field and select informations if OK *****/
		$ideaname = isset($_POST['addmember-ideaname']) ? $_POST['addmember-ideaname'] : '';
		$pseudo_userlogged = isset($_SESSION['profil']) ? $_SESSION['profil'] : '';
	
		if(!empty($ideaname) || (!empty($pseudo_userlogged))) {
			$infos_idea = retrieve_idea($DB, $ideaname);
			
			/***** If date of idea not expired *****/
			if(strtotime($infos_idea['ideadatetime']) > strtotime($infos_idea['NowDate'])) {
				$userid = retrieve_userid($DB, $pseudo_userlogged);

				/***** Register member-idea association (only if not already registered) *****/
				if(!empty($infos_idea['id']) || (!empty($userid))) {
					$ideaid = $infos_idea['id'];
					$ideauser_entries_before = check_ideauser_association($DB, $ideaid, $userid);
					if($ideauser_entries_before < 1) {
						$data_ideausers = array($infos_idea['id'], $userid);
						add_ideauser_association($DB, $data_ideausers);
						
       						/****** Check entries in database ******/ 
						$ideauser_entries = check_ideauser_association($DB, $ideaid, $userid);

						if($ideauser_entries > 0) {
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
header('location: '.$gozpeak_protocol.$gozpeak_host.'/index.php?page=idea&query='.$infos_idea['ideatype'].'&idea='.$ideaname);


?>
