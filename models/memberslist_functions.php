<?php


function check_eventname($DB, $eventname) {
        $req = $DB->prepare("SELECT COUNT(eventname) FROM events where eventname = ?");
        $req -> execute(array($eventname));
        $nbre_event = $req->fetchColumn();
        $req->closeCursor();
        return ($nbre_event);
}

function check_ideaname($DB, $ideaname) {
        $req = $DB->prepare("SELECT COUNT(ideaname) FROM ideas where ideaname = ?");
        $req -> execute(array($ideaname));
        $nbre_idea = $req->fetchColumn();
        $req->closeCursor();
        return ($nbre_idea);
}




function retrieve_eventid($DB, $eventname) {
        $req = $DB->prepare("SELECT id from events where eventname = ?");
        $req -> execute(array($eventname));
        $eventid = $req->fetchColumn();
        $req->closeCursor();
        return ($eventid);
}


function retrieve_ideaid($DB, $ideaname) {
        $req = $DB->prepare("SELECT id from ideas where ideaname = ?");
        $req -> execute(array($ideaname));
        $ideaid = $req->fetchColumn();
        $req->closeCursor();
        return ($ideaid);
}



function retrieve_membernames_of_event($DB, $eventid) {
        $req = $DB->prepare("SELECT pseudo from members, eventusers WHERE members.id = eventusers.memberid AND eventusers.eventid = ?;");
        $req -> execute(array($eventid));
        $memberlist = $req->fetchAll();
        $req->closeCursor();
        return ($memberlist);
}


function retrieve_membernames_of_idea($DB, $ideaid) {
        $req = $DB->prepare("SELECT pseudo from members, ideausers WHERE members.id = ideausers.memberid AND ideausers.ideaid = ?;");
        $req -> execute(array($ideaid));
        $memberlist = $req->fetchAll();
        $req->closeCursor();
        return ($memberlist);
}



#function retrieve_event($DB, $eventname) {
#        $req = $DB->prepare("SELECT id, organizer, language, eventname, eventdesc, eventtype, eventplace, level_language, DATE_FORMAT(date, 'le %d %b %H:%i') date, DATE_FORMAT(eventdatetime, '%a %b %d') eventday, DATE_FORMAT(eventdatetime, '%H:%i') eventtime FROM events where eventname = ?");
#        $req -> execute(array($eventname));
#        $infos_event = $req->fetch();
#        $req->closeCursor();
#        return ($infos_event);
#}
#
#
#/***** Functions to check if user is already registered to event *****/
#function retrieve_userid($DB, $pseudo) {
#        $req = $DB->prepare("SELECT id from members where pseudo = ?");
#        $req -> execute(array($pseudo));
#        $userid = $req->fetchColumn();
#        $req->closeCursor();
#        return ($userid);
#}
#
#
#function event_members_count($DB, $eventid) {
#        $req = $DB->prepare("SELECT COUNT(memberid) FROM eventusers where eventid = ?");
#        $req -> execute(array($eventid));
#        $nbre_members = $req->fetchColumn();
#        $req->closeCursor();
#        return ($nbre_members);
#}


?>
