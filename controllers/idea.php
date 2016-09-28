<?php

session_start();
require_once(CONTROLLERS.'init.php');
require_once(VIEWS.'styles.php');
require_once(MODELS.'dbconnect.php');
require_once(MODELS.'idea_functions.php');


if(isset($_GET['query']) && !empty($_GET['query'])) {
        $query = $_GET['query'];
}

if(isset($_GET['idea']) && !empty($_GET['idea'])) {
	$ideaname = $_GET['idea'];
}

/***** Retrieve idea informations from Database *****/
$infos_idea = retrieve_idea($DB, $ideaname);
$ideaid = $infos_idea['id'];

$DiffDate = retrieve_remaining_days_idea($DB, $ideaname);
if ($DiffDate < 0) {
	$DiffDate = "Evenement terminé";
} else {
	$DiffDate .= " jours";
}


/***** Count number of registered members for event *****/
$nb_members = idea_members_count($DB, $ideaid);

/***** Check if user logged *****/
$logged = check_logged();

if ($logged == 1) {
	/***** Check if user is already registered to the event *****/
        $pseudo = $_SESSION['profil'];
        $userid = retrieve_userid($DB, $pseudo);
        $nbre_entries = check_ideauser_association($DB, $ideaid, $userid);

	if ($pseudo == $infos_idea['organizer']) {
		$user_is_organizer = 1;
	} elseif(!empty($pseudo)) {

                if($nbre_entries > 0) {
                        $user_registered = 1;
                } else {
                        $user_registered = 0;
                }
        }

        require_once(VIEWS.'header-logged.php');
	require_once(MODALS.'modal-postevent-logged.php');
	require_once(VIEWS.'idea-logged.php');
	require_once(MODALS.'modal-displaymembers.php');

} else {
        require_once(VIEWS.'header-notlogged.php');
	require_once(MODALS.'modal-postevent-notlogged.php');
	require_once(VIEWS.'idea-notlogged.php');
}


require_once(MODALS.'modal-footer.php');
require_once(VIEWS.'scripts.php');
require_once(VIEWS.'footer.php');

unset($_SESSION['msg']);

?>
