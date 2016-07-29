<?php

try{
	$DB = new PDO('mysql:host=localhost;dbname=gozpeak_dev', 'gozpeak_dev', '#gozpeak_dev_pass#');
	$DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$DB->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$DB->exec("SET CHARACTER SET utf8");

} catch (PDOException $e) {
        echo $e->getMessage();
        die();

}

?>
