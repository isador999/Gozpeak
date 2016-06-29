<?php


function retrieve_event ($DB, $eventname) {
	$req = $DB->prepare("SELECT * FROM events where eventname = ?");
        //$req -> execute(array($_POST['pseudo']));
        $req -> execute(array($eventname));

        $infos_event = $req->fetchAll(PDO::FETCH_ASSOC);
	$req->closeCursor();

	return ($infos_event);
}


?>
