<?php
        require_once(CONTROLLERS.'language.php');
        //include('dbconnect.php');

        require_once(VIEWS.'styles.php');
        require_once(VIEWS.'welcome.php');

	### Pas besoin de scripts JS pour Welcome...  ??? ###
        //require_once(VIEWS.'modal.php');
        //require_once(VIEWS.'scripts.php');
        echo "Query_String :";
        echo $_SERVER['QUERY_STRING'];
        echo "Request_Uri :";
        echo $_SERVER['REQUEST_URI'];

?>

