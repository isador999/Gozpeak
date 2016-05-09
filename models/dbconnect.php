<?php

try{
        $DB = new PDO('mysql:host=localhost;dbname=BDD_NAME', 'BDD_USER', 'BDD_PASSWORD');

} catch (PDOException $e) {
        echo $e->getMessage();
        die();

}

?>
