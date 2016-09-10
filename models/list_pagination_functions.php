<?php

function event_paginate_retrieve_starting_id($DB, $eventoffset, $eventpagination, $eventtype) {
	$sql = "SELECT language, organizer, eventname, eventtype, DATE_FORMAT(eventdatetime, '%Y-%m-%d') eventday, DATE_FORMAT(eventdatetime, '%H:%i') eventtime FROM events where eventtype = :eventtype";
	#$sql = "SELECT language, organizer, eventname, eventtype, eventdatetime FROM events where eventtype = :eventtype";
	$sql .= " ORDER BY eventdatetime asc LIMIT :eventoffset, :eventpagination";

	$req = $DB->prepare($sql);
	$req -> execute(array(':eventoffset'=>$eventoffset, ':eventpagination'=>$eventpagination, ':eventtype'=>$eventtype));
	$events = $req->fetchAll(PDO::FETCH_ASSOC);
	$req->closeCursor();
	return ($events);
}


function idea_paginate_retrieve_starting_id($DB, $ideaoffset, $ideapagination, $ideatype) {
	$sql = "SELECT language, organizer, ideaname, ideatype, DATE_FORMAT(ideadatetime, '%Y-%m-%d') ideaday, DATE_FORMAT(ideadatetime, '%H:%i') ideatime FROM ideas where ideatype = :ideatype";
	#$sql = "SELECT language, organizer, ideaname, ideatype, ideadatetime FROM ideas where ideatype = :ideatype";
	$sql .= " ORDER BY ideadatetime asc LIMIT :ideaoffset, :ideapagination";

	$req = $DB->prepare($sql);
	$req -> execute(array(':ideaoffset'=>$ideaoffset, ':ideapagination'=>$ideapagination, ':ideatype'=>$ideatype));
	$ideas = $req->fetchAll(PDO::FETCH_ASSOC);
	$req->closeCursor();
	return ($ideas);
}


function convertDateToFr($date){
	#if($heure == 'yes')
	#{
        #$strDate = mb_convert_encoding('%A %d %B %Hh%M','ISO-8859-9','UTF-8');  
        #}
        #else
        #{
        $strDate = mb_convert_encoding('%A %d %B','ISO-8859-9','UTF-8');    
        #}
        return iconv("ISO-8859-9","UTF-8",strftime($strDate ,strtotime($date))); 
}


function count_events_by_type ($DB, $eventtype) {
        $req = $DB->prepare("SELECT COUNT(*) AS nb_total_events from events where eventtype = ?");
	$exec_array = array($eventtype);

        $req -> execute($exec_array);
        $nb_total_events = $req->fetchColumn();
        $req->closeCursor();
        return ($nb_total_events);
}


function count_ideas_by_type ($DB) {
        $req = $DB->prepare("SELECT COUNT(*) AS nb_total_ideas from ideas");
        $req -> execute(array());
        $nb_total_ideas = $req->fetchColumn();
        $req->closeCursor();
        return ($nb_total_ideas);
}


?>
