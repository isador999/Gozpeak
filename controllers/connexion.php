<?php

require_once('lib/sessions.php');

$logged = check_logged();
if ($logged == 1) {
	header('location: index.php?page=rennes');
}

if(empty($_GET['query'])) {
        $query = "gozpeak";
}

include ('lib/display.php');
require_once('models/dbconnect.php');
require_once('models/connexion_functions.php');
require_once('models/forgotpass_functions.php');


function check_pass_and_connect ($DB, $password, $active, $method) {
    if ($active == 1) {
	$password = sha1($password);
        $dbpass = retrieve_pass($DB, $password);
        if($dbpass == "$password") {
		$connect = "ok";
	}else{
		header ('location: index.php?page=connexion&error=4');
	}
    }else {
	header('location: index.php?page=connexion&error=3');
    }
return ($connect);

}
//End of Function


if(isset($_POST['submit'])) {
    $ident = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['pass']) ? $_POST['pass'] : '';

    if($ident == '' OR $password == '') {
	header('location: index.php?page=connexion&error=1');
    }else{
	$nbre_mail = mail_exist($DB, $ident);
	$nbre_pseudo = pseudo_exist($DB, $ident);

    	if ($nbre_mail == 1) {
	    $method = "email";
      	    $active = check_active_account_by_mail($DB, $ident);
	    $connect = check_pass_and_connect($DB, $password, $active, $method);
    	} elseif ($nbre_pseudo == 1) {
	    $method = "pseudo";
	    $active = check_active_account_by_pseudo($DB, $ident);
	    $connect = check_pass_and_connect($DB, $password, $active, $method);
    	} else {
	    header('location: index.php?page=connexion&error=2');
    	}
    }
}





if(isset($_POST['submit'])) {
	if ($connect == "ok") {
                if (isset($method) && ($method == "email")) {
                	$ident = select_pseudo($DB, $ident);
                 }

        	 session_start();
                 $_SESSION['profil'] = $ident;
                 $_SESSION['logged'] = 1;

		 $premium = check_if_premium($DB, $ident);
                 $_SESSION['premium'] = $premium;
                 header('location: index.php?page=rennes');
	}
}



require_once('Views/head.php');
require_once('Views/headband-notlogged.php');

// IF A NEW MEMBER IS CREATED, INSCRIPTION.PHP WILL SEND URL HERE AND THIS MESSAGE WILL BE DISPLAYED //
if(isset($_GET['subscribing']) AND ($_GET['subscribing'] == 1)) {
      my_echo ("4", "green", "Inscription validee ;-)  Pour activer votre compte, vous devez cliquer sur le lien de confirmation qui vous a ete envoye par email ");
}



// IF A MEMBER HAS RESET HIS PASSWORD, RESET_PASS.PHP WILL SEND URL HERE AND THIS MESSAGE WILL BE DISPLAYED //
$reinit = isset($_GET['reinit']) ? $_GET['reinit'] : '';
$login = isset($_GET['login']) ? $_GET['login'] : '';

if($reinit == 'ok') { 
	my_echo ("4", "green", "Votre mot de passe a bien été changé,  Vous pouvez désormais vous connecter avec ce nouveau mot de passe ;-) ");
}



$error = isset($_GET['error']) ? $_GET['error'] : '';

switch ($error) {
        case 1:
                my_echo ("4", "red", "Veuillez remplir correctement les champs de connexion ! ");
                break;
        case 2:
                my_echo ("4", "red", "L'email ou le pseudo rentre n'existe pas ");
                break;
        case 3:
                my_echo ("4", "red", "Votre compte n'est pas actif, verifiez votre email de confirmation! ");
                break;
        case 4:
                my_echo ("4", "red", "Mot de passe incorrect ! ");
        }

require_once('Views/connexion.php');
require_once('Views/footer.php');

?>

