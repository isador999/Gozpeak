<?php

function retrieve_event($DB, $eventname) {
  $req = $DB->prepare("SELECT id, eventdatetime, NOW() AS NowDate, eventtype FROM events where eventname = ?");
  $req -> execute(array($eventname));
  $infos_event = $req->fetch();
  $req->closeCursor();
  return ($infos_event);
}


function retrieve_userid($DB, $pseudo) {
  $req = $DB->prepare("SELECT id from members where pseudo = ?");
  $req -> execute(array($pseudo));
  $userid = $req->fetchColumn();
  $req->closeCursor();
  return ($userid);
}



/***** Functions to add/delete in eventusers table *****/
function add_eventuser_association($DB, $data_eventusers) {
  $req = $DB->prepare('INSERT INTO eventusers (eventid, memberid) VALUES (?, ?)');
  $req->execute($data_eventusers);
  $req->closeCursor();
}


function del_eventuser_association($DB, $data_eventusers) {
  $req = $DB->prepare('DELETE FROM eventusers where eventid = ? AND memberid = ?');
  $req->execute($data_eventusers);
  $req->closeCursor();
}


function check_eventuser_association($DB, $eventid, $memberid) {
	$req = $DB->prepare('SELECT COUNT(*) FROM eventusers where eventid = :eventid AND memberid = :memberid');
	$req -> execute(array(':eventid'=>$eventid, ':memberid'=>$memberid));
	$nbre_entries = $req->fetchColumn();
  $req -> closeCursor();
	return ($nbre_entries);
}




/***** Functions to add/delete in ideausers table *****/
function add_ideauser_association($DB, $data_ideausers) {
  $req = $DB->prepare('INSERT INTO ideausers (ideaid, memberid) VALUES (?, ?)');
  $req->execute($data_ideausers);
  $req->closeCursor();
}


function del_ideauser_association($DB, $data_ideausers) {
  $req = $DB->prepare('DELETE FROM ideausers where ideaid = ? AND memberid = ?');
  $req->execute($data_ideausers);
  $req->closeCursor();
}


function check_ideauser_association($DB, $ideaid, $memberid) {
	$req = $DB->prepare('SELECT COUNT(*) FROM ideausers where ideaid = :ideaid AND memberid = :memberid');
	$req -> execute(array(':ideaid'=>$ideaid, ':memberid'=>$memberid));
	$nbre_entries = $req->fetchColumn();
  $req -> closeCursor();
	return ($nbre_entries);
}


function retrieve_idea($DB, $ideaname) {
  $req = $DB->prepare("SELECT id, ideadatetime, SYSDATE() AS NowDate, ideatype FROM ideas where ideaname = ?");
  $req -> execute(array($ideaname));
  $infos_idea = $req->fetch();
  $req->closeCursor();
  return ($infos_idea);
}

?>
