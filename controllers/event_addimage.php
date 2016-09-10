<?php
/******** Start, or continue Session *******/
session_start();

require_once('./lib/sessions_init.php');
require_once('./lib/EventUploadHandler.php');
require_once('./lib/IdeaUploadHandler.php');
require_once('../models/dbconnect.php');


if (strpos($_SERVER['HTTP_REFERER'], "event")) {
	$event_upload_handler = new EventUploadHandler();
} elseif (strpos($_SERVER['HTTP_REFERER'], "idea")) {
	$idea_upload_handler = new IdeaUploadHandler();
}



if(($_POST) && ($_FILES['eventimage']['name'])) {
	if(!$_FILES['eventimage']['error']) {
		//now is the time to modify the future file name and validate the file
		$new_filename = strtolower($_FILES['eventimage']['tmp_name']); //rename file
		if($_FILES['eventimage']['size'] > (1024000)) { //can't be larger than 1 MB
			$valid_file = false;
			$messages = 'Erreur, ce fichier est trop gros pour être chargé';
		}

		//if the file has passed the test
		if($valid_file) {
			//move it to where we want it to be
			move_uploaded_file($_FILES['eventimage']['tmp_name'], '/srv/gozpeak_images/'.$new_filename);
			$messages = 'Le fichier a été uploadé avec succès :)';
		}
	} else {
		//set that to be the returned message
		$messages = "L'erreur suivante s'est produite lors de l'upload:  ".$_FILES['eventimage']['error'];
	}

	//you get the following information for each file:
	//$_FILES['field_name']['name']
	//$_FILES['field_name']['size']
	//$_FILES['field_name']['type']
	//$_FILES['field_name']['tmp_name']
}



/******** Set Messages depending error *******/
/*if (isset($error)) {
	if ($error == 'empty_fields') {
		$message='<div class="form-group"> <div class="alert alert-danger fade in"> <a href="#" class="close" data-dismiss="alert">&times;</a> Veuillez remplir les champs obligatoires pour votre inscription </div> </div>';
	}
	elseif ($error == 'bad_length_user') {
		$message='<div class="form-group"> <div class="alert alert-danger fade in"> <a href="#" class="close" data-dismiss="alert">&times;</a> L\'utilisateur de connexion est invalide </div> </div>';
	}
	elseif ($error == 'wrong_password') {
		$message='<div class="form-group"> <div class="alert alert-danger fade in"> <a href="#" class="close" data-dismiss="alert">&times;</a> Le mot de passe entré est incorrect </div> </div>';
	}
	elseif ($error == 'connection_method_undefined') {
		$message='<div class="form-group"> <div class="alert alert-danger fade in"> <a href="#" class="close" data-dismiss="alert">&times;</a> Une erreur est survenue lors de la connexion... <br> Veuillez réessayer ultérieurement </div> </div>';
	}
}*/


/******** Finally, set Global var if $message isset, and simply redirect to HOME *********/
if (isset($message)) {
	$_SESSION['msg'] = $message;
}
 header('location: '.$gozpeak_protocol.$gozpeak_host.'/index.php?page=event&event=A vos mousses');


?>

