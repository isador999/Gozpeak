<?php

function profil_info($DB, $pseudo) {
	$req = $DB->prepare("SELECT id, pseudo, email, name, lastname, profession, nationality, birthday, languages, premium from members where pseudo = ?");
	$req -> execute(array($pseudo));
	$infos = $req->fetch();
	$req->closeCursor();
	return ($infos);
}


function count_events ($DB, $pseudo) {
	$req = $DB->prepare("SELECT COUNT(id) from events where organizer = ?");
	$req -> execute(array($pseudo));
	$nb_events = $req->fetchColumn();
	$req->closeCursor();
	return ($nb_events);
}


//NOT FINISHED // THIS SQL FUNCTION MUST BE COMPLETED //
function profil_update($DB, $d) {
	$req = $DB->prepare('UPDATE members SET (pseudo, name, lastname, password) VALUES (?, ?, ?, ?)');
        $req->execute($d);
        $req->closeCursor();
}

?>
