<?php

function retrieve_event($DB, $eventname) {
        $req = $DB->prepare("SELECT organizer, language, eventname, eventdesc, eventtype, eventplace, level_language, DATE_FORMAT(date, 'le %d %b %H:%i') date, DATE_FORMAT(eventdatetime, '%a %b %d') eventday, DATE_FORMAT(eventdatetime, '%H:%i') eventtime FROM events where eventname = ?");
        $req -> execute(array($eventname));
        $infos_event = $req->fetch();
        $req->closeCursor();
        return ($infos_event);
}


function retrieve_remaining_days_event($DB,$eventname) {
	$req = $DB->prepare("SELECT DATEDIFF((SELECT DATE_FORMAT(eventdatetime, '%Y-%m-%d') eventday), CURDATE()) AS DiffDate FROM events where eventname = :eventname");
	$req -> execute(array(':eventname'=>$eventname));
	$DiffDate = $req->fetchColumn();
	$req->closeCursor();
	return ($DiffDate);
}


?>
