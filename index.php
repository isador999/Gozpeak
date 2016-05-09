<?php


// DECLARE SOME PATHS CONSTANTS (just used for PHP) //
define('ROOTDIR', __DIR__);
define('MODELS', ROOTDIR . '/models/');
define('CONTROLLERS', ROOTDIR . '/controllers/');
define('LIB', CONTROLLERS . '/lib/');

define('VIEWS', ROOTDIR . '/views/');

define('CSS', VIEWS . '/css/');
define('JS', VIEWS . '/js/');


### First loop to redirect to the next file (controller or view, depending of request and the existing files )    ###
### ------------------------------------------------------------------------------------------------------------- ###
### Première boucle PHP pour rediriger vers un fichier demandé (selon la requête reçue et les fichier existants)  ###
### La boucle tente d'abord de trouver un fichier Contrôleur PHP correspondant (dans 'controllers')		  ###
### Si il est absent, affiche directement la vue, si elle existe. 						  ###
### Si aucun des deux n'existe sur l'URL appelée, on affiche le contrôleur par défaut 'welcome.php'  (qui lui, appelle simplement la vue par défaut). ###

if(!empty($_GET['page'])) {
	$page = $_GET['page'];

	if(is_file(CONTROLLERS.$page.'.php')) {
		require_once (CONTROLLERS.$page.'.php');
        	#require_once ('controllers/'.$_GET['page'].'.php');
	}
	elseif (is_file(VIEWS.$page.'.php')) {
		require_once (VIEWS.$page.'.php');
		#require_once ('Views/'.$_GET['page'].'.php');
	} else {
		require_once (VIEWS.'404_error.php');
	}
} else {
	require_once(CONTROLLERS.'init.php');
	require_once(CONTROLLERS.'welcome.php');
}


?>
