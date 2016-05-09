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



function update_password($DB, $newpass, $pseudo) {
        $req = $DB -> prepare("UPDATE members SET password = :newpass where pseudo = :pseudo");
        $req -> execute(array(':newpass'=>$newpass, ':pseudo'=>$pseudo));

        $req -> closeCursor();
}

?>



