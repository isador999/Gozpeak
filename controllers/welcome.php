<?php
        require_once(CONTROLLERS.'language.php');


        $ViewPages[] = VIEWS.'welcome.php';
        $ViewTitle = $generic['fr']['region'][0];
        require_once(VIEWS.'maintemplate.php');

        /*** echo "Query_String :";
        echo $_SERVER['QUERY_STRING'];
        echo "Request_Uri :";
        echo $_SERVER['REQUEST_URI']; ***/

?>
