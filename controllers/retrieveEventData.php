<?php

session_start();
require_once('./lib/sessions_init.php');
require_once('./language/fr.php');

require_once('../models/dbconnect.php');
require_once('../models/ajax_event_functions.php');


if($_GET) {
	$eventtype = isset($_GET['zpeaktype']) ? $_GET['zpeaktype'] : '';
	$eventname = isset($_GET['eventname']) ? $_GET['eventname'] : '';


	/************ Unitary tests ************/
	/***************************************/
	$fields_to_check = array($eventtype, $eventname);
	foreach ($fields_to_check as $field) {
    if((trim($field) == '') OR (empty($field))) {
      echo "NOK: rule1";
      $error="empty_fields";
    }
  }

	if(!isset($error)) {
		if (!preg_match("/(event|idea)/", $eventtype)) {
			echo "NOK: rule2";
			$error="error in query type";
		}

		if ($eventtype == "event") {
			$eventname_exists = check_eventname($DB, $eventname);
		} elseif ($eventtype == "idea") {
			$eventname_exists = check_ideaname($DB, $eventname);
		}

		if (!isset($eventname_exists) OR ($eventname_exists < 1)) {
      echo "NOK: rule3";
			$error="this event not exists";
		}
	}


	if(!isset($error)) {
		if ($eventtype == "event") {
			//$eventid = retrieve_eventid($DB, $eventname);
			//$memberslist = retrieve_membernames_of_event($DB, $eventid);
			//$ajax_infos_event = ajax_retrieve_event($DB, $eventid);
		} elseif ($eventtype == "idea") {
			$ideaid = retrieve_ideaid($DB, $eventname);
			//$memberslist = retrieve_membernames_of_idea($DB, $ideaid);
			$ajax_infos_idea = ajax_retrieve_idea($DB, $ideaid);
		}

		/****** Finally return list of members ******/
		echo json_encode($ajax_infos_idea);
		/*$lastinfo = end($ajax_infos_idea);
		foreach($ajax_infos_idea as $key => $info) {
			if ($info == $lastinfo) {
				echo $key; echo $info;
			} else {
				echo $key; echo $info."|";
			}
		}*/

//		$lastmember = end($memberslist);
//		if (!empty($memberslist)) {
//			foreach($memberslist as $member) {
//				if ($member == $lastmember) {
//    					echo $member['pseudo'];
//				} else {
//    					echo $member['pseudo'].", ";
//				}
//			}
//		} else {
//			echo "Aucun membre n'est inscrit actuellement";
//		}
	}
}


if(isset($error)) {
	$message='<div class="form-group"> <div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a>  Désolé, une erreur est survenue lors de la dernière opération, ou l\'événement n\'existe pas.  Veuillez réessayer ultérieurement </div> </div>';
}


/******** Finally, set Global var if $message isset *********/
if (isset($message)) {
	$_SESSION['msg'] = $message;
}

?>
