<?php

function profile_info($DB, $pseudo) {
	$req = $DB->prepare("SELECT id, pseudo, email, name, lastname, nationality, birthday, premium from members where pseudo = ?");
	$req -> execute(array($pseudo));
	$infos = $req->fetch();
	$req->closeCursor();
	return ($infos);
}


function pseudo_exist($DB, $pseudo) {
        $req = $DB->prepare("SELECT COUNT(pseudo) FROM members where pseudo = ?");
        $req -> execute(array($pseudo));
        $nbre_pseudo = $req->fetchColumn();
        $req->closeCursor();
        return ($nbre_pseudo);
}


function count_events ($DB, $pseudo) {
	$req = $DB->prepare("SELECT COUNT(id) from events where organizer = ?");
	$req -> execute(array($pseudo));
	$nb_events = $req->fetchColumn();
	$req->closeCursor();
	return ($nb_events);
}


//NOT FINISHED // THIS SQL FUNCTION MUST BE COMPLETED //
function profile_update($DB, $d) {
	$req = $DB->prepare('UPDATE members SET (pseudo, name, lastname, password) VALUES (?, ?, ?, ?)');
        $req->execute($d);
        $req->closeCursor();
}


/***** Warning !  Deletion works, but deletion of user's events is not made today *****/
/***** It could be kind of : "delete from events where organizer = 'pseudo', but we need to test "; *****/

function profile_delete($DB, $pseudo) {
	$req = $DB->prepare("delete from members where pseudo = ?");
	$req -> execute(array($pseudo));
	$infos = $req->fetch();
	$req->closeCursor();
}

?>
