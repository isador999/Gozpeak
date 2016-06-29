<?php

// DECLARE SOME PATHS CONSTANTS (useful for PHP) //
define('ROOTDIR', __DIR__);
define('MODELS', ROOTDIR . '/models/');
define('CONTROLLERS', ROOTDIR . '/controllers/');
define('LIB', CONTROLLERS . '/lib/');

define('VIEWS', ROOTDIR . '/views/');

define('ERROR_PAGES', ROOTDIR . '/error_pages/');
define('MODALS', VIEWS . '/modals/');
define('CSS', VIEWS . '/css/');
define('JS', VIEWS . '/js/');


### First loop to redirect to the next file (controller or view, depending of request and the existing files )    ###
### ------------------------------------------------------------------------------------------------------------- ###
### Première boucle PHP pour rediriger vers un fichier demandé (selon la requête reçue et les fichier existants)  ###
### La boucle tente d'abord de trouver un fichier Contrôleur PHP correspondant (dans 'controllers')		  ###
### Si il est absent, affiche directement la vue, si elle existe. 						  ###
### Si aucun des deux n'existe sur l'URL appelée, on affiche le contrôleur par défaut 'welcome.php'  (qui lui, appelle simplement la vue par défaut). ###

error_reporting(E_ALL);

if(strpos($_SERVER['REQUEST_URI'], "index.php/")) {
	header("location: http://demo.gozpeak.com/index.php");
}

if(strpos($_SERVER['REQUEST_URI'], "index")) {
	if(isset($_SERVER['REQUEST_URI']))
		#if(strpos($_SERVER['REQUEST_URI'], "page")) {
		if(!empty($_GET['page'])) {
			$page = $_GET['page'];
	
			if(is_file(CONTROLLERS.$page.'.php')) {
				require_once (CONTROLLERS.$page.'.php');
			}
			#elseif (is_file(VIEWS.$page.'.php')) {
			#	require_once (VIEWS.$page.'.php');
			#}
			else {
				require_once (ERROR_PAGES.'404.php');
			}
		} else {
			#require_once (ERROR_PAGES.'404.html');
			require_once(CONTROLLERS.'init.php');
			require_once(CONTROLLERS.'welcome.php');
		}
	} else {
		require_once(CONTROLLERS.'init.php');
	        require_once(CONTROLLERS.'welcome.php');
}

?>
