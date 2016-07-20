<?php

try{
        $DB = new PDO('mysql:host=DB_HOST;dbname=DB_NAME', 'YOUR_USER', 'YOUR_PASSWORD');
	$DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$DB->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$DB->exec("SET CHARACTER SET utf8");

} catch (PDOException $e) {
        echo $e->getMessage();
        die();

}

?>
