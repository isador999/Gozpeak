<?php

function pseudo_exist($DB, $pseudo) {
	$req = $DB->prepare("SELECT COUNT(pseudo) FROM members where pseudo = ?");
	$req -> execute(array($pseudo));
	$nbre_pseudo = $req->fetchColumn();
	$req->closeCursor();
	return ($nbre_pseudo);
}


function mail_exist($DB, $email) {
	$req = $DB->prepare("SELECT COUNT(pseudo) FROM members where email = ?");
	$req -> execute(array($email));
	$nbre_mail = $req->fetchColumn();
	$req->closeCursor();
	return ($nbre_mail);
}


function add_member($DB, $d) {
	$req = $DB->prepare('INSERT INTO members (pseudo, email, password, randomkey) VALUES (?, ?, ?, ?)');
  $req->execute($d);
  $req->closeCursor();
}


?>
