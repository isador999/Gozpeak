<?php

function retrieve_events_by_type ($DB, $type, $language) {
	#$sql = "SELECT organizer, language, eventname, eventtype, eventplace, eventhour, eventminutes FROM events where eventtype = ?";
	$sql = "SELECT language, organizer, eventname, eventtype, DATE_FORMAT(eventdatetime, '%a %b %d') eventday, DATE_FORMAT(eventdatetime, '%H:%i') eventtime FROM events where eventtype = ?";
	$exec_array = array($type);

	if (!empty($language)) { 
		$place_holders = str_repeat('?,', count($language)-1) . '?';
		$sql .= " AND language IN ($place_holders)";
		$exec_array = array_merge($exec_array, $language);
	}

	if (!empty($date)) {
		#$sql .= ' AND eventdate = ?';
		$sql .= ' AND date = ?';
		$exec_array = array_merge($exec_array, array($date));
	}

	$sql .= " ORDER BY eventday desc";
	$req = $DB->prepare($sql);

	$req -> execute($exec_array);
        $events = $req->fetchAll(PDO::FETCH_ASSOC);
	$req->closeCursor();
	return ($events);
}




function retrieve_ideas_by_type ($DB, $type, $language, $date) {
        #$sql = "SELECT organizer, ideaname, ideaplace, language, ideadate, ideahour, ideaminutes FROM ideas where ideatype = ?";
	$sql = "SELECT language, organizer, ideaname, ideatype, DATE_FORMAT(ideadatetime, '%a %b %d') ideaday, DATE_FORMAT(ideadatetime, '%H:%i') ideatime FROM ideas where ideatype = ?";
        $exec_array = array($type);

        if (!empty($language)) {
                $place_holders = str_repeat('?,', count($language)-1) . '?';
                $sql .= " AND language IN ($place_holders)";
                $exec_array = array_merge($exec_array, $language);
        }

        if (!empty($date)) {
                $sql .= ' AND date = ?';
                $exec_array = array_merge($exec_array, array($date));
        }

	$sql .= " ORDER BY ideaday desc";
        $req = $DB->prepare($sql);
        $req -> execute($exec_array);
        $ideas = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return ($ideas);
}


?>
