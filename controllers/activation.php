<?php

require_once('lib/display.php');
require_once('models/dbconnect.php');
require_once('models/activation_functions.php');

$pseudo = $_GET['login'];
$key = $_GET['key'];

$state = check_account_state($DB, $key, $pseudo);
echo "STATUS : $state";


if ($state == 1) {
        $message = "Bonjour ".$pseudo." , Votre compte est deja actif  ! ";
} else {
        update_account_to_active($DB, $key, $pseudo);
        $message = "Bonjour ".$pseudo." , Votre compte vient  d'etre active ! Vous pouvez vous maintenant vous connecter et proposer des idees de sorties GoZpeak !  ";
}


include_once('Views/head.php');
//include_once('Views/headband-notlogged.php');
include_once('Views/activation.php');

?>

