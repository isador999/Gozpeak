<?php


function retrieve_idea($DB, $ideaname) {
  $req = $DB->prepare("SELECT id, organizer, language, ideaname, ideadesc, ideatype, ideaplace, ideaphone, level_language, DATE_FORMAT(date, '%d %b %H:%i') date, CONCAT(UCASE(LEFT(DAYNAME(ideadatetime),1)), SUBSTRING(DAYNAME(ideadatetime), 2)) ideadayname, DATE_FORMAT(ideadatetime, '%d') ideadaynumber, MONTHNAME(ideadatetime) ideamonthname, DATE_FORMAT(ideadatetime, '%Y') ideayear, DATE_FORMAT(ideadatetime, '%HH%i') ideatime FROM ideas where ideaname = ?");
  $req -> execute(array($ideaname));
  $infos_idea = $req->fetch();
  $req->closeCursor();
  return ($infos_idea);
}


function retrieve_remaining_days_idea($DB,$ideaname) {
	$req = $DB->prepare("SELECT DATEDIFF((SELECT DATE_FORMAT(ideadatetime, '%Y-%m-%d') ideaday), CURDATE()) AS DiffDate FROM ideas where ideaname = :ideaname");
	$req -> execute(array(':ideaname'=>$ideaname));
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


function check_ideauser_association($DB, $ideaid, $memberid) {
  $req = $DB->prepare('SELECT COUNT(*) FROM ideausers where ideaid = :ideaid AND memberid = :memberid');
  $req -> execute(array(':ideaid'=>$ideaid, ':memberid'=>$memberid));
  $nbre_entries = $req->fetchColumn();
  $req -> closeCursor();
  return ($nbre_entries);
}


function idea_members_count($DB, $ideaid) {
  $req = $DB->prepare("SELECT COUNT(memberid) FROM ideausers where ideaid = ?");
  $req -> execute(array($ideaid));
  $nbre_members = $req->fetchColumn();
  $req->closeCursor();
  return ($nbre_members);
}

?>
