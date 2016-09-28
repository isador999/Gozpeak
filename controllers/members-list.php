<?php

session_start();
require_once('./lib/sessions_init.php');
require_once('./language/fr.php');

require_once('../models/dbconnect.php');
require_once('../models/memberslist_functions.php');


if($_GET) {
	$eventtype = isset($_GET['zpeaktype']) ? $_GET['zpeaktype'] : '';
	$eventname = isset($_GET['eventname']) ? $_GET['eventname'] : '';


	/************ Unitary tests ************/
	/***************************************/
	$fields_to_check = array($eventtype, $eventname);
	foreach ($fields_to_check as $field) {
                if((trim($field) == '') OR (empty($field))) {
                //if(empty($field)) {
                        echo "NOK: rule1";
                        $error="empty_fields";
                }
        }

	if(!isset($error)) {
		if (!preg_match("/(zpeakevent|zpeakidea)/", $eventtype)) {
			echo "NOK: rule2";
			$error="error in query type";
		}

		if ($eventtype == "zpeakevent") {
			$eventname_exists = check_eventname($DB, $eventname);
		} elseif ($eventtype == "zpeakidea") { 
			$eventname_exists = check_ideaname($DB, $eventname);
		}

		if (!isset($eventname_exists) OR ($eventname_exists < 1)) {
                        echo "NOK: rule3";
			$error="this event not exists";
		}
	}


	if(!isset($error)) {
		if ($eventtype == "zpeakevent") {
			$eventid = retrieve_eventid($DB, $eventname);
			$memberslist = retrieve_membernames_of_event($DB, $eventid);
		} elseif ($eventtype == "zpeakidea") {
			$ideaid = retrieve_ideaid($DB, $eventname);
			$memberslist = retrieve_membernames_of_idea($DB, $ideaid);
		}

		/****** Finally return list of members ******/
		$lastmember = end($memberslist);
		foreach($memberslist as $member) {
			if ($member == $lastmember) {
    				echo $member['pseudo'];
			} else {
    				echo $member['pseudo'].", ";
			}
		}
	}
}


if(isset($error)) {
	$message='<div class="form-group"> <div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a>  Désolé, une erreur est survenue lors de la dernière opération.  Veuillez réessayer ultérieurement </div> </div>';
}


/******** Finally, set Global var if $message isset *********/
if (isset($message)) {
	$_SESSION['msg'] = $message;
}

?>

