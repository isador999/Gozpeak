<?php

try{
        $DB = new PDO('mysql:host=localhost;dbname=gozpeak_dev', 'gozpeak_dev', 'gozpeak_dev');

} catch (PDOException $e) {
        echo $e->getMessage();
        die();

}

?>
