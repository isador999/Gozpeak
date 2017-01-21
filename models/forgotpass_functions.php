<?php


function mail_exist($DB, $email) {
  $req = $DB->prepare("SELECT COUNT(pseudo) FROM members where email = ?");
  $req -> execute(array($email));
  $nbre_mail = $req->fetchColumn();
  $req->closeCursor();
  return ($nbre_mail);
}

function set_resetpass_token ($DB, $token, $pseudo) {
	$req = $DB->prepare("UPDATE members SET resetpass_token = :token where pseudo = :pseudo");
	$req -> execute(array(':token'=>$token, ':pseudo'=>$pseudo));
	$req -> closeCursor();
}


function set_resetpass_expiration($DB, $pseudo) {
	$req = $DB -> prepare("UPDATE members set resetpass_expiration = (NOW() + INTERVAL 1 DAY) where pseudo = :pseudo");
	//$req = $DB->prepare("UPDATE members SET resetpass_expiration = :datetime where pseudo = :pseudo;");
	$req -> execute(array(':pseudo'=>$pseudo));

	$req -> closeCursor();
}

function select_pseudo ($DB, $ident) {
  $req = $DB->prepare("SELECT pseudo from members where email = ?");
  $req -> execute(array($ident));
  $pseudo = $req->fetchColumn();
  $req -> closeCursor();
  return ($pseudo);
}


?>
