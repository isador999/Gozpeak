<?php

function retrieve_resetpass_token($DB, $pseudo) {
  $req = $DB -> prepare("SELECT resetpass_token from members where pseudo = :pseudo");
  $req -> execute(array(':pseudo'=>$pseudo));
	$token = $req -> fetchColumn();
  $req -> closeCursor();
	return($token);
}



function retrieve_resetpass_expiration($DB, $pseudo) {
  $req = $DB -> prepare("SELECT resetpass_expiration from members where pseudo = :pseudo");
  $req -> execute(array(':pseudo'=>$pseudo));
	$Expiration = $req -> fetchColumn();
  $req -> closeCursor();
	return($Expiration);
}



/*********** Functions used by 'reset_user_password.php' file ************/
function update_password($DB, $new_dbpass, $pseudo) {
  $req = $DB -> prepare("UPDATE members SET password = :newpass where pseudo = :pseudo");
  $req -> execute(array(':newpass'=>$new_dbpass, ':pseudo'=>$pseudo));
  $req -> closeCursor();
	return 0;
}


function set_resetpass_token($DB, $resetpass_token, $pseudo) {
  $req = $DB -> prepare("UPDATE members SET resetpass_token = :resetpass_token where pseudo = :pseudo");
  $req -> execute(array(':resetpass_token'=>$resetpass_token, ':pseudo'=>$pseudo));
  $req -> closeCursor();
}


function set_resetpass_expiration($DB, $resetpass_expire, $pseudo) {
  $req = $DB -> prepare("UPDATE members SET resetpass_expiration = :resetpass_expire where pseudo = :pseudo");
  $req -> execute(array(':resetpass_expire'=>$resetpass_expire, ':pseudo'=>$pseudo));
  $req -> closeCursor();
}


function retrieve_pass_from_pseudo ($DB, $pseudo) {
  $req = $DB->prepare("SELECT password from members where pseudo = ?");
  $req -> execute(array($pseudo));
  $hashed_dbpass = $req->fetchColumn();
  $req->closeCursor();
  return ($hashed_dbpass);
}


?>
