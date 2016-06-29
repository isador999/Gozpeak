<?php


require_once('lib/sessions.php');
include_once('Views/head.php');

if (empty($_GET['query'])) {
	$query = "gozpeak";
	$view  = "Views/proposition/gozpeak.php";
} else {
	$query = $_GET['query'];
	$slogan = ("Views/proposition/$query-head.php");
	// EXAMPLE : Views/proposition/runzpeak-head.php will contain the corresponding message and the corresponding illustration. // 
	$view  = "Views/proposition/proposition.php";
}


$logged = check_logged();

if ($logged == 0) {
        header('location: index.php?page=connexion');
} elseif ($logged == 1) {
        include_once('Views/headband-logged.php');
}



require_once('models/dbconnect.php');
require_once('models/proposition_functions.php');



if(isset($_POST['submit'])) {
	$event = isset($_POST['event']) ? $_POST['event'] : '';
	$language = isset($_POST['language']) ? $_POST['language'] : '';
	$place = isset($_POST['place']) ? $_POST['place'] : '';
	$date = isset($_POST['date']) ? $_POST['date'] : '';
	$hour = isset($_POST['hour']) ? $_POST['hour'] : '';

	// FACULTATIVE FIELDS //
	$minutes = isset($_POST['minutes']) ? $_POST['minutes'] : '00';
	$desc = isset($_POST['desc']) ? $_POST['desc'] : '';
	

	if ($event == '' OR $language == '' OR $place == '' OR $date == '' OR $hour == '') {
		header("location: index.php?page=proposition&query=$query&error=1");
	} else {
		$datetime = "$date $hour:$minutes";
		$allowed_date = date("Y-m-d H:i", strtotime("+1 hour"));
		if ($datetime <= $allowed_date) {
			header("location: index.php?page=proposition&query=$query&error=2");
		} else {
			$organizer = $_SESSION['profil'];
			$fields = array("$organizer", "$language", "$event", "$desc", "$query", "$place", "$date", "$hour", "$minutes");
			if ($_SESSION['premium'] == 1) {
				insert_event($DB, $fields);
			} else {
				insert_idea($DB, $fields);
			/*echo $_SESSION['profil'];
			foreach($fields as $f) : 
				echo $f;
			endforeach;*/
			}
			header("location: index.php?page=list&query=$query&eventposted=1");
		}
	}
}


include_once("$slogan");
include_once("Views/proposition/proposition.php");
#include_once('Views/proposition/proposition.php');
include_once('Views/footer.php');


?>
