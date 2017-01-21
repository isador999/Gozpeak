<?php

try {
	$DB = new PDO('mysql:host=localhost;dbname=gozpeak_dev', 'root', 'passwd');
	$DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$DB->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$DB->exec("SET CHARACTER SET utf8");
	if (isset($SQL[$_SESSION['language']]['locale'])) {
		$DB->exec("SET lc_time_names =".$SQL[$_SESSION['language']]['locale']);
	}
} catch (PDOException $e) {
  echo $e->getMessage();
  die();
}

?>
