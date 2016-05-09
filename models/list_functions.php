<?php


function retrieve_events_by_type ($DB, $type, $language, $date) {
	$sql = "SELECT organizer, eventname, eventplace, language, eventdate, eventhour, eventminutes FROM events where eventtype = ?";
	$exec_array = array($type);

	if (!empty($language)) { 
		$place_holders = str_repeat('?,', count($language)-1) . '?';
		$sql .= " AND language IN ($place_holders)";
		$exec_array = array_merge($exec_array, $language);
	}

	if (!empty($date)) {
		$sql .= ' AND eventdate = ?';
		$exec_array = array_merge($exec_array, array($date));
	}

	$sql .= " ORDER BY eventhour asc";
	$req = $DB->prepare($sql);

	$req -> execute($exec_array);
        $events = $req->fetchAll(PDO::FETCH_ASSOC);
	$req->closeCursor();
	return ($events);
}




function retrieve_ideas_by_type ($DB, $type, $language, $date) {
        $sql = "SELECT organizer, ideaname, ideaplace, language, ideadate, ideahour, ideaminutes FROM ideas where ideatype = ?";
        $exec_array = array($type);

        if (!empty($language)) {
                $place_holders = str_repeat('?,', count($language)-1) . '?';
                $sql .= " AND language IN ($place_holders)";
                $exec_array = array_merge($exec_array, $language);
        }

        if (!empty($date)) {
                $sql .= ' AND ideadate = ?';
                $exec_array = array_merge($exec_array, array($date));
        }

        $sql .= " ORDER BY ideahour asc";
        $req = $DB->prepare($sql);
        $req -> execute($exec_array);
        $ideas = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return ($ideas);
}


?>
