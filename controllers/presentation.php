<?php

require_once('lib/sessions.php');


include_once('Views/head.php');
if(empty($_GET['query'])) {
        $query = "gozpeak";
}

$logged = check_logged();

include_once('Views/head.php');

if ($logged == 1) {
        include_once('Views/headband-logged.php');
} else {
        include_once('Views/headband-notlogged.php');
}


include_once('Views/presentation.php');
include_once('Views/footer.php');

?>
