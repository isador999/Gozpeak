<?

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


?>


