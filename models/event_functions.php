<?php

function retrieve_event($DB, $eventname) {
  $req = $DB->prepare("SELECT id, organizer, language, eventname, eventdesc, eventtype, eventplace, level_language, DATE_FORMAT(date, '%d %b %H:%i') date, CONCAT(UCASE(LEFT(DAYNAME(eventdatetime),1)), SUBSTRING(DAYNAME(eventdatetime), 2)) eventdayname, DATE_FORMAT(eventdatetime, '%d') eventdaynumber, MONTHNAME(eventdatetime) eventmonthname, DATE_FORMAT(eventdatetime, '%Y') eventyear, DATE_FORMAT(eventdatetime, '%HH%i') eventtime FROM events where eventname = ?");
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


/***** Functions to check if user is already registered to event *****/
function retrieve_userid($DB, $pseudo) {
  $req = $DB->prepare("SELECT id from members where pseudo = ?");
  $req -> execute(array($pseudo));
  $userid = $req->fetchColumn();
  $req->closeCursor();
  return ($userid);
}


function check_eventuser_association($DB, $eventid, $memberid) {
  $req = $DB->prepare('SELECT COUNT(*) FROM eventusers where eventid = :eventid AND memberid = :memberid');
  $req -> execute(array(':eventid'=>$eventid, ':memberid'=>$memberid));
  $nbre_entries = $req->fetchColumn();
  $req -> closeCursor();
  return ($nbre_entries);
}


function event_members_count($DB, $eventid) {
  $req = $DB->prepare("SELECT COUNT(memberid) FROM eventusers where eventid = ?");
  $req -> execute(array($eventid));
  $nbre_members = $req->fetchColumn();
  $req->closeCursor();
  return ($nbre_members);
}


?>
