<?php

session_start();
require_once(CONTROLLERS.'init.php');
require_once(VIEWS.'styles.php');
require_once(MODELS.'dbconnect.php');
require_once(MODELS.'idea_functions.php');


if(isset($_GET['query']) && !empty($_GET['query'])) {
        $query = $_GET['query'];
}

/***** Check if user logged *****/
$logged = check_logged();
if ($logged == 1) {
        require_once(VIEWS.'header-logged.php');
	require_once(MODALS.'modal-postevent-logged.php');
} else {
        require_once(VIEWS.'header-notlogged.php');
	require_once(MODALS.'modal-postevent-notlogged.php');
}

$ideaname = $_GET['idea'];
$infos_idea = retrieve_idea($DB, $ideaname);
$DiffDate = retrieve_remaining_days_idea($DB, $ideaname);


/***** Check if user is already registered to the event *****/
if ($logged == 1) {
        $pseudo = $_SESSION['profil'];
        if(!empty($pseudo)) {
                $userid = retrieve_userid($DB, $pseudo);
                $ideaid = $infos_idea['id'];
                $nbre_entries = check_ideauser_association($DB, $ideaid, $userid);

                if($nbre_entries > 0) {
                        $user_registered = 1;
                } else {
                        $user_registered = 0;
                }
        }
}


if ($DiffDate < 0) {
	$DiffDate = "Evenement terminé";
} else {
	$DiffDate .= " jours";
}

require_once(VIEWS.'idea.php');
require_once(MODALS.'modal-footer.php');
require_once(VIEWS.'scripts.php');
require_once(VIEWS.'footer.php');

unset($_SESSION['msg']);

?>
