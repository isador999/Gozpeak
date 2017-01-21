<?php

function mail_exist ($DB, $email) {
	$req = $DB->prepare("SELECT COUNT(email) FROM members where email = ?");
  $req -> execute(array($email));
  $nbre_email = $req->fetchColumn();
	$req->closeCursor();
  return ($nbre_email);
}

function pseudo_exist ($DB, $pseudo) {
	$req = $DB->prepare("SELECT COUNT(pseudo) FROM members where pseudo = ?");
  $req -> execute(array($pseudo));
  $nbre_pseudo = $req->fetchColumn();
	$req->closeCursor();
  return ($nbre_pseudo);
}


function check_active_account_by_mail ($DB, $email) {
	$req = $DB->prepare("SELECT active from members where email = ?");
  $req -> execute(array($email));
  $active = $req->fetchColumn();
	$req->closeCursor();
	return ($active);
}

function check_active_account_by_pseudo ($DB, $pseudo) {
	$req = $DB->prepare("SELECT active from members where pseudo = ?");
  $req -> execute(array($pseudo));
  $active = $req->fetchColumn();
	$req->closeCursor();
	return ($active);
}

function retrieve_pass_from_pseudo ($DB, $pseudo) {
	$req = $DB->prepare("SELECT password from members where pseudo = ?");
  $req -> execute(array($pseudo));
  $hashed_dbpass = $req->fetchColumn();
  $req->closeCursor();
	return ($hashed_dbpass);
}

function retrieve_pass_from_email ($DB, $email) {
	$req = $DB->prepare("SELECT password from members where email = ?");
  $req -> execute(array($email));
  $hashed_dbpass = $req->fetchColumn();
  $req->closeCursor();
	return ($hashed_dbpass);
}


function select_pseudo ($DB, $ident) {
	$req = $DB->prepare("SELECT pseudo from members where email = ?");
  $req -> execute(array($ident));
  $pseudo = $req->fetchColumn();
	$req -> closeCursor();
	return ($pseudo);
}

function check_if_premium ($DB, $ident) {
	$req = $DB -> prepare("SELECT premium from members where pseudo = :pseudo");
	$req -> execute(array(':pseudo'=>$ident));
	$premium = $req -> fetchColumn();
	$req -> closeCursor();
	return ($premium);
}



function retrieve_resetpass_fields($DB, $pseudo) {
	$req = $DB->prepare("SELECT resetpass_expiration, resetpass_allowed from members where pseudo = ?");
	$req -> execute(array($pseudo));
	$fields = $req->fetchAll(PDO::FETCH_ASSOC);
	$req -> closeCursor();
	return ($fields);
}


function update_passwd($DB, $newpass, $pseudo) {
	$req = $DB->prepare("UPDATE members SET password = :newpass where pseudo = :pseudo");
	$req -> execute(array(':newpass'=>$newpass, ':pseudo'=>$pseudo));
	$req -> closeCursor();
}

?>
