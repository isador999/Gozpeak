<?php

require_once(CONTROLLERS.'display.php');
require_once(LIB.'display.php');

$logged = check_logged();
if ($logged == 1) {
        header("location: index.php?page=profil&profil=$_SESSION[profil]");
}

if(empty($_GET['query'])) {
        $query = "gozpeak";
}


include_once('Views/head.php');
include_once('Views/headband-notlogged.php');

if(isset($_POST['submit'])) {
    require_once('models/dbconnect.php');
    require_once('models/inscription_functions.php');

    $nbre_pseudo = pseudo_exist($DB, $_POST['pseudo']);
    $nbre_mail = mail_exist($DB, $_POST['email']); 

    if(empty($_POST['pseudo']) OR empty($_POST['email']) OR empty($_POST['email2']) OR empty($_POST['pass']) OR empty($_POST['pass2']))
    {
	header('location: index.php?page=inscription&error=empty');
    }
    // Verfier que le pseudo entré par le user n'est pas deja existant dans la Base de Donnees...  //
    elseif($nbre_pseudo > 0)
    {
	header('location: index.php?page=inscription&error=pseudo_exist');
    } 
    elseif($nbre_mail > 0)
    {
        header('location: index.php?page=inscription&error=mail_exist');
    }
   // Sinon, si les champs ne sont pas vides, et que le pseudo n'existe pas deja, il faut verifier (longueurs, adresses mails valides, etc... ) 
   elseif (strlen($_POST['pass']) > 25 || strlen($_POST['pass']) < 6) 
   {
	header('location: index.php?page=inscription&error=length_pass');
   }
   elseif ($_POST['pass'] != $_POST['pass2']) 
   {
	header('location: index.php?page=inscription&error=check_passwords');
   }
   elseif (strlen($_POST['email']) < 7) 
   {
	// CKMail ($_POST['email']);
	header('location: index.php?page=inscription&error=invalid_mail');
   }
   elseif ($_POST['email'] != $_POST['email2']) 
   {
	header('location: index.php?page=inscription&error=check_mails');
   }
   // La fonction 'htmlentities' permet d'echapper les caracteres HTML eventuellement entres par l'utilisateur
   else {
	//$req->closeCursor();
       	$pseudo = htmlspecialchars(trim($_POST['pseudo']));
       	$email = htmlspecialchars(trim($_POST['email']));
       	$password = htmlspecialchars(trim($_POST['pass']));

	$key = md5(microtime(TRUE)*100000);
	$password = hash(sha1, $password);

	$d = array("$pseudo", "$email", $password, "$key");
	add_member($DB, $d);


	//URLENCODE TO CHANGE SPECIAL CHARS TO CODE//
	$pseudo = urlencode($pseudo);
        $key = urlencode($key);

        mail($email, "Confirmation d'inscription GoZpeak ", "Bonjour $pseudo Merci de votre inscription sur Gozpeak !  Pour rendre votre compte actif, cliquez sur le lien suivant  : https://gozpeak.no-ip.info/index.php?page=activation&login=$pseudo&key=$key");

	header('location: index.php?page=connexion&subscribing=1');

        }
}


if (isset($_GET['error'])) {
        if ($_GET['error'] == 'empty') {
                my_echo ("3", "red", "Veuillez remplir les champs obligatoires pour votre inscription [Pseudo, Mail, Mot de passe]");
        }
        elseif ($_GET['error'] == 'pseudo_exist') {
                my_echo ("3", "red", "Le pseudo que vous avez choisi existe deja ! ");
        }
        elseif ($_GET['error'] == 'mail_exist') {
                my_echo ("3", "red", "L'email que vous avez rentré existe déjà ! ");
        }
        elseif ($_GET['error'] == 'length_pass') {
                my_echo ("3", "red", "Le mot de passe doit etre compris entre 6 et 25 caracteres !");
        }
        elseif ($_GET['error'] == 'check_passwords') {
                my_echo ("3", "red", "Les deux mots de passe entres sont differents ! ");
        }
        elseif ($_GET['error'] == 'invalid_mail') {
                my_echo ("3", "red", "Merci de rentrer une adresse email valide ! ");
        }
        elseif ($_GET['error'] == 'check_mails') {
                my_echo ("3", "red", "Les deux adresses emails rentrees ne correspondent pas ! ");
        }
}


include_once('Views/inscription.php');
include_once('Views/footer.php');


?>


