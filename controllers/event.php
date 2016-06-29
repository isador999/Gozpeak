<?php

require_once('lib/sessions.php');
require_once('models/dbconnect.php');
require_once('models/event_functions.php');

$query = $_GET['query'];
$event = $_GET['event'];
$logged = check_logged();
$infos_event = retrieve_event($DB, $event);

include_once('Views/head.php');
include_once('Views/logo.php');
if ($logged == 1) {
        include_once('Views/headband-logged.php');
} else {
        include_once('Views/headband-notlogged.php');
}


include_once('Views/event.php');
include_once('Views/footer.php');

?>
