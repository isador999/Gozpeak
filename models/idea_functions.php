<?php

function retrieve_idea($DB, $ideaname) {
        $req = $DB->prepare("SELECT organizer, language, ideaname, ideadesc, ideatype, ideaplace, level_language, DATE_FORMAT(date, 'le %d %b %H:%i') date, DATE_FORMAT(ideadatetime, '%a %b %d') ideaday, DATE_FORMAT(ideadatetime, '%H:%i') ideatime FROM ideas where ideaname = ?");
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


?>
