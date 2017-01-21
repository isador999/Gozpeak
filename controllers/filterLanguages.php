<?php


session_start();

// Inscription Validation before saving in database //
require_once('./language.php');
require_once('./lib/sessions_init.php');
require_once('./lib/check_strings.php');
require_once('../models/dbconnect.php');
require_once('../models/list_pagination_functions.php');


if ($_POST) {
	$languages = isset($_POST['filteredLanguages']) ? $_POST['filteredLanguages'] : '';

	//echo $languages;
	$filteredLanguages = explode(', ', $languages);

	foreach ($filteredLanguages as $entry) {
		echo $entry;
	}
}

?>
