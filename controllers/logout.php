<?php

session_start();

if(!isset($_SESSION['profil']) or empty ($_SESSION['profil'])) {
	header('location: index.php?page=connexion');
}


if(!isset($_GET['query']) or empty($_GET['query'])) {
	$query = "gozpeak";
}

include_once('Views/head.php');
include_once('Views/headband-notlogged.php');
include_once('Views/logout.php');
include_once('Views/footer.php');

$_SESSION = array();
session_destroy();

?>
