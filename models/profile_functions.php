<?php

function profile_info($DB, $pseudo) {
	#$req = $DB->prepare("SELECT id, pseudo, email, name, lastname, nationality, birthday, DATE_FORMAT(date, '%d') subscribedaynumber, DATE_FORMAT(date, '%M') subscribemonth, DATE_FORMAT(date, '%Y') subscribeyear, DATE_FORMAT(date, '%H:%i') subscribetime, premium from members where pseudo = ?");
	$req = $DB->prepare("SELECT id, pseudo, email, name, lastname, nationality, birthday,  DAYNAME(date) subscribedayname, DATE_FORMAT(date, '%d') subscribedaynumber, MONTHNAME(date) subscribemonthname, DATE_FORMAT(date, '%Y') subscribeyear, premium from members where pseudo = ?");
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

function select_mail($DB, $pseudo) {
	$req = $DB->prepare("SELECT COUNT(email) FROM members where pseudo = :pseudo");
  $req -> execute(array(':pseudo'=>$pseudo));
  $nbre_email = $req->fetchColumn();
  $req->closeCursor();
  return ($nbre_email);
}

function count_ideas($DB, $pseudo) {
	$req = $DB->prepare("SELECT COUNT(id) from ideas where organizer = ?");
	$req -> execute(array($pseudo));
	$nb_events = $req->fetchColumn();
	$req->closeCursor();
	return ($nb_events);
}


//NOT FINISHED // THIS SQL FUNCTION MUST BE COMPLETED //
//function profile_update($DB, $pseudo, $email, $lastname, $name, $nationality, $birthdate, $speaked_languages) {
function profile_update($DB, $pseudo, $email, $lastname, $name, $nationality, $birthdate) {
	$sql = "UPDATE members SET email = " . $DB->quote($email);

	if(!empty($lastname)) {
		$sql .= ", lastname = " . $DB->quote($lastname);
	}

	if(!empty($name)) {
		$sql .= ", name = " . $DB->quote($name);
	}

	if(!empty($nationality)) {
		$sql .= ", nationality = " . $DB->quote($nationality);
	}

	if(!empty($birthdate)) {
		$sql .= ", birthday = " . $DB->quote($birthdate);
	}

	// if(!empty($speaked_languages)) {
	// 	$sql .= ", name = " . $DB->quote($name);
	// }
	$sql .= " where pseudo = " . $DB->quote($pseudo);

	$req = $DB->prepare($sql);
	$req->execute();
  $req->closeCursor();
}



/***** Warning !  Deletion works, but deletion of user's events is not made today *****/
/***** It could be kind of : "delete from events where organizer = 'pseudo', but we need to test "; *****/
function profile_delete($DB, $pseudo) {
	$req = $DB->prepare("DELETE from members where pseudo = ?");
	$req -> execute(array($pseudo));
	$req->closeCursor();
}


function get_last_connection($DB, $pseudo) {
	$req = $DB->prepare("SELECT last_connection from members where pseudo = :pseudo");
	$req -> execute(array(':pseudo'=>$pseudo));
	$connectionTime = $req->fetchColumn();
	$req->closeCursor();
	return ($connectionTime);
}


?>
