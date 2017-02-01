<?php

function list_events_by_type($DB, $eventoffset, $eventpagination, $eventtype, $filteredLanguages, $year, $month) {
	$sql = "SELECT language, organizer, eventname, eventtype, CONCAT(UCASE(LEFT(DAYNAME(eventdatetime),1)), SUBSTRING(DAYNAME(eventdatetime), 2)) eventdayname, DATE_FORMAT(eventdatetime, '%d') eventdaynumber, MONTHNAME(eventdatetime) eventmonthname, DATE_FORMAT(eventdatetime, '%H:%i') eventtime FROM events";

	if(!empty($eventtype)) {
		$sql .= "  where eventtype = :eventtype";
	}

	//If filter of languages provided
	if(isset($filteredLanguages) && (!empty($filteredLanguages))) {
		$sql .= " AND (language = ";

		//Get last lang
		$lastlang = end($filteredLanguages);
		foreach ($filteredLanguages as $lang) {
			if($lang != $lastlang) {
				$sql .= "'$lang' OR language = ";
			} elseif ($lang == $lastlang) {
				$sql .= "'$lang')";
			}
		}
	}

	if(!empty($year)) {
		$sql .= " AND YEAR(eventdatetime) = '$year'";
	}

	if(!empty($month)) {
		$month = lcfirst($month);
		$sql .= " AND MONTHNAME(eventdatetime) = '$month'";
	}

	$sql .= " ORDER BY eventdatetime asc LIMIT :eventoffset, :eventpagination";

	$req = $DB->prepare($sql);
	$req -> execute(array(':eventoffset'=>$eventoffset, ':eventpagination'=>$eventpagination, ':eventtype'=>$eventtype));
	$events = $req->fetchAll(PDO::FETCH_ASSOC);
	$req->closeCursor();
	return ($events);
}


function list_ideas_by_type($DB, $ideaoffset, $ideapagination, $ideatype, $filteredLanguages, $year, $month, $membername) {
	$sql = "SELECT language, organizer, ideaname, ideatype, CONCAT(UCASE(LEFT(DAYNAME(ideadatetime),1)), SUBSTRING(DAYNAME(ideadatetime), 2)) ideadayname, DATE_FORMAT(ideadatetime, '%d') ideadaynumber, MONTHNAME(ideadatetime) ideamonthname, DATE_FORMAT(ideadatetime, '%H:%i') ideatime FROM ideas ";
	$args = 0;

	if(!empty($ideatype)) {
		$sql .= " where ideatype = '$ideatype'";
		$args = 1;
	}

	//If filter of languages provided
	if(isset($filteredLanguages) && (!empty($filteredLanguages))) {
		$sql .= " AND (language = ";
		$args = 1;

		//Get last lang
		$lastlang = end($filteredLanguages);
		foreach ($filteredLanguages as $lang) {
			if($lang != $lastlang) {
				$sql .= "'$lang' OR language = ";
			} elseif ($lang == $lastlang) {
				$sql .= "'$lang')";
			}
		}
	}

	if(!empty($membername)) {
		if($args > 0) {
			$sql .= " AND organizer = '$membername'";
		} else {
			$sql .= " where organizer = '$membername'";
		}
	}

	if(!empty($year)) {
		$sql .= " AND YEAR(ideadatetime) = '$year'";
	}
	if(!empty($month)) {
		$month = lcfirst($month);
		$sql .= " AND MONTHNAME(ideadatetime) = '$month'";
	}

	$sql .= " ORDER BY ideadatetime asc LIMIT :ideaoffset, :ideapagination";

	$req = $DB->prepare($sql);
	$req -> execute(array(':ideaoffset'=>$ideaoffset, ':ideapagination'=>$ideapagination));
	$ideas = $req->fetchAll(PDO::FETCH_ASSOC);
	$req->closeCursor();
	return ($ideas);
}


function count_events_by_type ($DB, $eventtype, $filteredLanguages, $year, $month) {
	$sql = "SELECT COUNT(*) AS nb_total_events from events where eventtype = :eventtype";

	if(isset($filteredLanguages) && (!empty($filteredLanguages))) {
		$sql .= " AND (language = ";

		//Get last lang
		$lastlang = end($filteredLanguages);
		foreach ($filteredLanguages as $lang) {
			if($lang != $lastlang) {
				$sql .= "'$lang' OR language = ";
			} elseif ($lang == $lastlang) {
				$sql .= "'$lang')";
			}
		}
	}

	$sql .= " AND YEAR(eventdatetime) = '$year'";

	if(!empty($month)) {
		$month = lcfirst($month);
		$sql .= " AND MONTHNAME(eventdatetime) = '$month'";
	}

	$req = $DB->prepare($sql);
	$req -> execute(array(':eventtype'=>$eventtype));
  $nb_total_events = $req->fetchColumn();
  $req->closeCursor();
  return ($nb_total_events);
}


function count_ideas_by_type ($DB, $ideatype, $filteredLanguages, $year, $month, $membername) {
	$sql = "SELECT COUNT(*) AS nb_total_ideas from ideas ";
	$args = 0;

	if(!empty($ideatype)) {
		$sql .= "where ideatype = '$ideatype'";
		$args = 1;
	}

	if(isset($filteredLanguages) && (!empty($filteredLanguages))) {
		$sql .= " AND (language = ";
		$args = 1;

		//Get last lang
		$lastlang = end($filteredLanguages);
		foreach ($filteredLanguages as $lang) {
			if($lang != $lastlang) {
				$sql .= "'$lang' OR language = ";
			} elseif ($lang == $lastlang) {
				$sql .= "'$lang')";
			}
		}
	}

	if(!empty($membername)) {
		if ($args > 0) {
			$sql .= " AND organizer = '$membername'";
		} else {
			$sql .= " where organizer = '$membername'";
		}
	}

	$sql .= " AND YEAR(ideadatetime) = '$year'";

	if(!empty($month)) {
		$month = lcfirst($month);
		$sql .= " AND MONTHNAME(ideadatetime) = '$month'";
	}

	$req = $DB->prepare($sql);
	//$req -> execute(array(':ideatype'=>$ideatype));
	$req -> execute();

  $nb_total_ideas = $req->fetchColumn();
  $req->closeCursor();
  return ($nb_total_ideas);
}

?>
