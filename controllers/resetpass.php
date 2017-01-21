<?php

session_start();
require_once(CONTROLLERS.'language.php');
require_once(LIB.'sessions_init.php');
require_once(MODELS.'dbconnect.php');
require_once(MODELS.'resetpass_functions.php');

$page = isset($_GET['page']) ? $_GET['page'] : '';

$token = isset($_GET['token']) ? $_GET['token'] : '';
$login = isset($_GET['login']) ? $_GET['login'] : '';
$DBtoken = retrieve_resetpass_token($DB, $login);
$token_expiration = retrieve_resetpass_expiration($DB, $login);


/************ If the link contains required variables, check their validity now *************/
if(empty($token) OR empty($login) OR ($DBtoken !== $token) OR (date('Y-m-d H:i:s') >= $token_expiration)) {
	$message='<div class="form-group"> <div class="alert alert-danger fade in">  Désolé, ce lien est invalide ou expirée.  </div> </div>';
	$result="invalid_link";
}
else {
	$result="valid_link";
}
/*********************************************************************************************/



/******************* Then, redirect to RESETPASSFORM or HOME page, depending on precedent result *********************/
if (isset($result)) {
	//echo $result;
	if($result == "invalid_link") {
	/******** set Global var if message isset, and simply redirect to HOME. *********/
		if (isset($message)) {
			$_SESSION['msg'] = $message;
		}
	} elseif($result == "valid_link") {
		$_SESSION['resetpass'] = 'valid';
		$_SESSION['resetpass_login'] = $login;
	}

	redirect_to_page($baseUrl, $page);
}

?>
