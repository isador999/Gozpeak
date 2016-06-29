<?php

try{
        $DB = new PDO('mysql:host=localhost;dbname=your_dbname', 'your_dbuser', 'your_dbpassword');

} catch (PDOException $e) {
        echo $e->getMessage();
        die();

}

?>
