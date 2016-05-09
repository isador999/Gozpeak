<?php
require_once('lib/sessions.php');

$logged = check_logged();
if ($logged == 1) {
        header('location: index.php?page=rennes');
}

if(empty($_GET['query'])) {
        $query = "gozpeak";
}
 
include_once('lib/display.php');

if(isset($_POST['submit'])) {
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

?>
