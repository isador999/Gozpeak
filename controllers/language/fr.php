<?php

$SQL['fr']['locale'] = "fr_FR";

// GENERAL
$generic['fr']['what'][0]['text'] = "C'est quoi Gozpeak ?";
$generic['fr']['what'][0]['title'] = "Explications du concept Gozpeak";
$generic['fr']['region'][0] = "Gozpeak en Bretagne";
$generic['fr']['city'][0]['name'] = "Rennes";
$generic['fr']['city'][0]['title'] = "Cliquez pour choisir une autre ville";
$generic['fr']['text'][0] = "Activités linguistiques et culturelles";
$generic['fr']['footer'][0] = "All content copyright &copy; Clyde OperaRumba 2017";
$generic['fr']['cities']['title'] = "Cette ville n'est pas disponible pour le moment";


// Modal generic strings
$modal['fr']['generic']['closed'] = "Fermer";


// Modal What
$modal['fr']['what']['title'] = "Le nouveau concept pour apprendre une langue";
$modal['fr']['what'][0]['presentation'] = "
<p>Vous avez certainement remarqué qu’apprendre une langue ce n’est pas seulement de la théorie. Vous êtes peut-être arrivés à la conclusion qu´il faut rencontrer des natifs pour améliorer votre niveau. Savez-vous que dans votre ville, des natifs qui parlent la langue que vous êtes en train d'étudier ont eux aussi besoin de pratiquer la vôtre?
						  Nous nous sommes confrontés au problème et nous avons trouvé une solution : </p>
<p class='center'><img src='views/images/gozpeak_small.png' alt='GoZpeak' title='GoZpeak' /></p>
<p><img src='views/images/gozpeak_mini.png' alt='GoZpeak' title='GoZpeak' />
&nbsp; a été créé par des professionnels de langues étrangères pour mettre en contact les personnes et les communautés qui veulent partager leur langue native </p>
<p class='center'> L'idée est simple </p>
<p>&nbsp;</p>
<p class='center concept'> &Tab;1 LANGUE + 1 ACTIVIT&Eacute; + NATIFS = GO ZPEAK !&Tab; </p>
<p>&nbsp;</p>
<p> Puisque l'on apprend en pratiquant, 4 manières différentes vous sont proposées pour choisir comment, quand et où trouver une activité linguistique dans votre ville.
Vous avez la possibilité de créer votre profil, proposer votre activité et inviter des personnes qui ont envie de parler votre langue et de partager votre culture. </p>
<p> Vous voulez en savoir plus ?  Continuez à découvrir ce que propose notre site et surtout...  &nbsp; &nbsp;
<img src='views/images/gozpeak_mini.png' alt='GoZpeak' title='GoZpeak' /></p>
";


// Modal Inscription
$modal['fr']['inscription']['title'] = "Inscription";
$modal['fr']['inscription']['field'][0]['mandatory']['desc'] = "Pseudo";
$modal['fr']['inscription']['field'][0]['mandatory']['placeholder'] = "Votre nom / pseudo de connexion";
$modal['fr']['inscription']['field'][1]['mandatory']['desc'] = "E-mail";
$modal['fr']['inscription']['field'][1]['mandatory']['placeholder'] = "adresse@gmail.com";
$modal['fr']['inscription']['field'][2]['mandatory']['desc'] = "Confirmation de l'E-mail";
$modal['fr']['inscription']['field'][2]['mandatory']['placeholder'] = "Confirmer l'adresse E-mail";
$modal['fr']['inscription']['field'][3]['mandatory']['desc'] = "Mot de passe";
$modal['fr']['inscription']['field'][3]['mandatory']['placeholder'] = "Mot de passe (8 caractères minimum)";
$modal['fr']['inscription']['field'][4]['mandatory']['desc'] = "Confirmation mot de passe";
$modal['fr']['inscription']['field'][4]['mandatory']['placeholder'] = "Confirmer le mot de passe";
$modal['fr']['inscription']['check']['desc'] = "S'inscrire";



// Modal UpdateProfile
$modal['fr']['profile']['edition']['title'] = "Edition de votre Zpeak ID ! ";

$modal['fr']['profile']['edition']['pseudo']['desc'] = "Pseudonyme";
$modal['fr']['profile']['edition']['pseudo']['title'] = "Votre pseudonyme ne peut pas être modifié";
$modal['fr']['profile']['edition']['pseudo']['placeholder'] = "Votre pseudo";
$modal['fr']['profile']['edition']['field'][0]['desc'] = "Nom";
$modal['fr']['profile']['edition']['field'][0]['placeholder'] = "Votre Nom";
$modal['fr']['profile']['edition']['field'][1]['desc'] = "Prénom";
$modal['fr']['profile']['edition']['field'][1]['placeholder'] = "Votre Prénom";
$modal['fr']['profile']['edition']['field'][2]['desc'] = "E-mail";
$modal['fr']['profile']['edition']['field'][2]['placeholder'] = "E-mail";
$modal['fr']['profile']['edition']['field'][3]['desc'] = "Nationalité(s)";
$modal['fr']['profile']['edition']['field'][3]['placeholder'] = "Votre nationalité";
$modal['fr']['profile']['edition']['field'][4]['desc'] = "Date de naissance";
$modal['fr']['profile']['edition']['field'][4]['placeholder'] = "Format 3 mai 1992 : 1992-05-03";
$modal['fr']['profile']['edition']['select']['lang']['label'] = "Langues parlées";
$modal['fr']['profile']['edition']['check']['desc'] = "Mettre à jour la Zpeak ID";

$modal['fr']['profile']['edition']['selectlang']['help'] = "Maintenez la touche 'Ctrl' enfoncée pour choisir plusieurs langues";


//Modal to list events of a user (from profile view)
$modal['fr']['profile']['eventlist']['title'] = "Vos propositions d'idées";
$modal['fr']['profile']['eventlist']['empty'] = "Vous n'avez encore rien proposé sur Gozpeak. <br> N'hésitez pas à lancer une idée en cliquant <a href='#' onclick=$('#modalProfileEventListing').modal('hide'); data-toggle='modal' data-target='#modalSelectQuery' > ici </a> ";


// Modal ProfileChangePassword
// Modal PasswordChange
// $modal['fr']['profile']['changepass']['title'] = "Changement de votre mot de passe";
// $modal['fr']['profile']['changepass']['field'][0]['desc'] = "Mot de passe actuel";
// $modal['fr']['profile']['changepass']['field'][0]['input'] = "profile_password";
// $modal['fr']['profile']['changepass']['field'][0]['type'] = "password";
// $modal['fr']['profile']['changepass']['field'][0]['spanclass'] = "glyphicon glyphicon-eye-open";
// $modal['fr']['profile']['changepass']['field'][0]['placeholder'] = "Entrez votre mot de passe actuel";
// $modal['fr']['profile']['changepass']['field'][1]['desc'] = "Nouveau mot de passe";
// $modal['fr']['profile']['changepass']['field'][1]['input'] = "profile_new_password";
// $modal['fr']['profile']['changepass']['field'][1]['type'] = "password";
// $modal['fr']['profile']['changepass']['field'][1]['spanclass'] = "glyphicon glyphicon-eye-open";
// $modal['fr']['profile']['changepass']['field'][1]['placeholder'] = "Choisir un nouveau mot de passe";
// $modal['fr']['profile']['changepass']['field'][2]['desc'] = "Confirmer le nouveau mot de passe";
// $modal['fr']['profile']['changepass']['field'][2]['input'] = "profile_confirm_new_password";
// $modal['fr']['profile']['changepass']['field'][2]['type'] = "password";
// $modal['fr']['profile']['changepass']['field'][2]['spanclass'] = "glyphicon glyphicon-eye-open";
// $modal['fr']['profile']['changepass']['field'][2]['placeholder'] = "Confirmer le nouveau mot de passe";
// $modal['fr']['profile']['changepass']['check']['desc'] = "Mettre à jour le mot de passe";


// Modal DeletionProfile
$modal['fr']['profiledeletion']['title'] = "Attention, vous avez demandé à supprimer votre compte Gozpeak ...";
$modal['fr']['profiledeletion']['field'][0]['desc'] = "Si vous voulez réellement supprimer votre compte, veuillez entrez la chaine 'SUPPRIMER' en majuscules ";
$modal['fr']['profiledeletion']['field'][0]['placeholder'] = "SUPPRIMER";
$modal['fr']['profiledeletion']['check']['desc'] = "Supprimer maintenant mon compte et mes données Gozpeak";


/*********************************
    Variables for Modals Passwords
***********************************/

// Modal PasswordChange
$modal['fr']['changepass']['title'] = "Changement de votre mot de passe";
$modal['fr']['changepass']['field'][0]['desc'] = "Mot de passe actuel";
$modal['fr']['changepass']['field'][0]['placeholder'] = "";
$modal['fr']['changepass']['field'][1]['desc'] = "Nouveau mot de passe";
$modal['fr']['changepass']['field'][1]['placeholder'] = "";
$modal['fr']['changepass']['field'][2]['desc'] = "Confirmer le nouveau mot de passe";
$modal['fr']['changepass']['field'][2]['placeholder'] = "";
$modal['fr']['changepass']['check']['desc'] = "Mettre à jour le mot de passe";


// Modal ForgotPass
$modal['fr']['forgotpass']['title'] = "Récupération de votre mot de passe";
$modal['fr']['forgotpass']['field'][0]['desc'] = "Vérification de l'adresse mail";
$modal['fr']['forgotpass']['field'][0]['placeholder'] = "example@gmail.com";
$modal['fr']['forgotpass']['check']['desc'] = "Valider";


//Modal ResetPass
$modal['fr']['resetpass']['title'] = "Réinitialiser votre mot de passe";
$modal['fr']['resetpass']['field'][0]['desc'] = "Choisir un nouveau mot de passe";
$modal['fr']['resetpass']['field'][0]['placeholder'] = "Nouveau mot de passe";
$modal['fr']['resetpass']['field'][1]['desc'] = "Confirmez le nouveau mot de passe";
$modal['fr']['resetpass']['field'][1]['placeholder'] = "Confirmez le nouveau mot de passe";
$modal['fr']['resetpass']['check']['desc'] = "Valider";

/****************************************
   End of :Variables for Modals Passwords
*****************************************/


// Modal Connection
$modal['fr']['connection']['title'] = "Connexion";
$modal['fr']['connection']['field'][0]['mandatory']['desc'] = "Login";
$modal['fr']['connection']['field'][0]['mandatory']['placeholder'] = "Votre pseudo ou votre adresse E-mail";
$modal['fr']['connection']['field'][1]['mandatory']['desc'] = "Mot de passe";
$modal['fr']['connection']['field'][1]['mandatory']['placeholder'] = "Votre mot de passe";
$modal['fr']['connection']['check']['link'] = "Mot de passe oublié ? ";
$modal['fr']['connection']['check']['desc'] = "Se connecter";


/***** Modal Postevent *****/
$modal['fr']['postevent']['title'] = "Proposer votre idée ";
$modal['fr']['postevent']['field'][0]['desc'] = "Evénement / Activité";
$modal['fr']['postevent']['field'][0]['placeholder'] = "Le nom de l'événement";
$modal['fr']['postevent']['field'][1]['desc'] = "Lieu de l'événement";
$modal['fr']['postevent']['field'][1]['placeholder'] = "Un bar, un parc, salle de concert... ";
$modal['fr']['postevent']['field'][2]['desc'] = "Description de l'événement";
$modal['fr']['postevent']['field'][2]['placeholder'] = "Décrivez votre sortie / activité";
$modal['fr']['postevent']['field'][3]['desc'] = "Date & Heure";
$modal['fr']['postevent']['field'][3]['placeholder'] = "Jour et Heure de l'événement";
$modal['fr']['postevent']['field'][4]['desc'] = "Téléphone (facultatif)";
$modal['fr']['postevent']['field'][4]['placeholder'] = "0623456789";
$modal['fr']['postevent']['check']['desc'] = "Proposer la sortie !";

$modal['fr']['eventedit']['title'] = "Modifier votre idée d'événement !";
$modal['fr']['eventedit']['check']['desc'] = "Valider les modifications";


//Postevent success/error futur messages (POO).
$message['fr']['postevent']['length']['eventname'] = "Le nom doit être compris entre 6 et 25 caractères";
$message['fr']['postevent']['length']['eventplace'] = "Le lieu de l'événement doit être compris entre 6 et 25 caractères";
$message['fr']['postevent']['length']['eventdesc'] = "La description doit faire 15 caractères au minimum";
$message['fr']['postevent']['length']['eventphone'] = "Le numéro de téléphone doit faire 10 chiffres";
$message['fr']['postevent']['specialchars'] = "Certains champs ne doivent pas contenir de caractères spéciaux";
$message['fr']['postevent']['lang'] = "La langue de l'événement est invalide";
$message['fr']['postevent']['langlevel'] = "Le niveau de langue de l'événement est invalide";
$message['fr']['postevent']['organizernotfound'] = "Impossible de vérifier les autorisations, veuillez vous (re)connecter. ";
$message['fr']['postevent']['eventexists'] = "Un événement avec ce nom existe déjà";




/*****  List of Select Field *****/
/* select lang */
// $modal['fr']['select']['lang']['label'] = "Langue à pratiquer";
// $modal['fr']['select']['lang']['default']['entry'] = "Choisissez une langue";
// $modal['fr']['select']['lang']['default']['value'] = "";
// $modal['fr']['select']['lang']['option'][0]['entry'] = "Anglais";
// $modal['fr']['select']['lang']['option'][1]['entry'] = "Espagnol";
// $modal['fr']['select']['lang']['option'][2]['entry'] = "Italien";
// $modal['fr']['select']['lang']['option'][3]['entry'] = "Français";
// $modal['fr']['select']['lang']['option'][4]['entry'] = "Libre, International";
$modal['fr']['selectlang']['label'] = "Langue à pratiquer";
$modal['fr']['selectlang']['default']['entry'] = "Choisissez une langue";
$modal['fr']['selectlang']['default']['value'] = "";

/* select langlevel */
$modal['fr']['selectlanglevel']['label'] = "Niveau de la langue";
$modal['fr']['selectlanglevel']['default']['entry'] = "Choisissez un niveau";
$modal['fr']['selectlanglevel']['default']['value'] = "";
$modal['fr']['selectlanglevel']['option'][0]['entry'] = "Débutant";
$modal['fr']['selectlanglevel']['option'][1]['entry'] = "Intermédiaire";
$modal['fr']['selectlanglevel']['option'][2]['entry'] = "Avancé";


/***** Modal SelectQuery *****/
$modal['fr']['SelectQuery']['title'] = "Ajout de votre idée d'événement";


// Add members in event-logged / idea-logged
$form['fr']['addmember']['desc'] = "S'inscrire à cet événement !";
$form['fr']['addmember']['title'] = "L'inscription aux événements nécessite d'être connecté à votre compte Gozpeak";

$form['fr']['listmembers']['desc'] = "Liste des membres inscrits";
$form['fr']['listmembers']['title'] = "Cliquez pour afficher les membres inscrits à l'événement";
$form['fr']['displaymembers']['title'] = "Liste des membres actuellement inscrits à l'événement";
#$form['fr']['organizer']['desc'] = "Afficher le numéro de téléphone de l'organisateur";
#$form['fr']['organizer']['title'] = "L'organisateur ne peut pas s'inscrire à son propre événement";
$form['fr']['delmember']['desc'] = "Se désinscrire de l'événement !";

#$form['fr']['organizer']['desc'] = " Vous êtes l'organisateur de cet événement ";
$form['fr']['organizer']['title'] = "L'organisateur ne peut pas s'inscrire à son propre événement";
$form['fr']['organizer']['eventedit']['desc'] = "Organisateur : Modifier votre événement";
$form['fr']['organizer']['eventedit']['title'] = "Cliquez pour modifier les informations de votre événement";



// HEADER
$headband['fr']['welcomebranding'] = "Bienvenue sur ";


$headband['fr']['registration']['text'] = "S'inscrire";
$headband['fr']['registration']['title'] = "Créez-vous un compte";
$headband['fr']['connection']['text'] = "Se connecter";
$headband['fr']['connection']['title'] = "Connexion";
$headband['fr']['logout'] = "Se déconnecter";
$headband['fr']['search']['text'] = "Trouver une activité";
$headband['fr']['search']['title'] = "Recherche indisponible pour le moment";
$headband['fr']['event']['text'] = "Ajout d'événement";
$headband['fr']['event']['title'] = "Proposez votre événement";


// FOOTER
$footer['fr']['contact']['text'] = "Contactez-nous";
$footer['fr']['contact']['title'] = "Contactez l'équipe Gozpeak";
$footer['fr']['title'] = "Informations Pratiques";
$footer['fr']['socials']['desc'] = "Retrouvez Gozpeak et ses activités sur ";

/***** Footer ModalContact *****/
$modal['fr']['contact']['title'] = "Fomulaire de contact";
$modal['fr']['contact']['field'][0]['placeholder'] = "Nom";
$modal['fr']['contact']['field'][0]['desc'] = "Nom";
$modal['fr']['contact']['field'][1]['placeholder'] = "Email";
$modal['fr']['contact']['field'][1]['desc'] = "Email";
$modal['fr']['contact']['field'][2]['placeholder'] = "Objet de vote message";
$modal['fr']['contact']['field'][2]['desc'] = "Objet";
$modal['fr']['contact']['textarea']['desc'] = "Votre message";
$modal['fr']['contact']['textarea']['placeholder'] = "Entrez votre message";
$modal['fr']['contact']['captcha']['desc'] = "Contrôle anti-robot";
$modal['fr']['contact']['captcha']['placeholder'] = "Entrez le résultat";
$modal['fr']['contact']['check']['desc'] = "Envoyer votre message";



$modal['fr']['forgotpass']['title'] = "Récupération de votre mot de passe";
$modal['fr']['forgotpass']['field'][0]['desc'] = "Vérification de l'adresse mail";
$modal['fr']['forgotpass']['field'][0]['placeholder'] = "adresse@gmail.com";
$modal['fr']['forgotpass']['check']['desc'] = "Valider";

$footer['fr']['premium']['text'] = "Devenir Premium";
$footer['fr']['premium']['title'] = "Cliquez pour passer au compte Gozpeak Premium";


// HOME
$home['fr']['run']['text'] = "Pratiquer et faire du sport";
$home['fr']['art']['text'] = "Pratiquer et se cultiver";
$home['fr']['eat']['text'] = "Pratiquer et manger";
$home['fr']['party']['text'] = "Pratiquer et boire un verre";
$home['fr']['promote']['text'] = "Pratiquez vos langues étrangères favorites en rencontrant des natifs ! ";


// MINI-LANG ICON PATHS //
$minilang['fr']['icon']['english']['text'] = "Anglais";
$minilang['fr']['icon']['spanish']['text'] = "Espagnol";
$minilang['fr']['icon']['italian']['text'] = "Italien";
$minilang['fr']['icon']['french']['text'] = "Français";
$minilang['fr']['icon']['multiples']['text'] = "Autre / Multiples";
/*$minilang['fr']['icon']['portugais']['png'] = "views/images/p_portugais.png";
$minilang['fr']['icon']['portugais']['text'] = "Portugais";
$minilang['fr']['icon']['portugais']['value'] = "portugais";
$minilang['fr']['icon']['breton']['png'] = "views/images/p_breton.png";
$minilang['fr']['icon']['breton']['text'] = "Breton";
$minilang['fr']['icon']['breton']['value'] = "breton";*/
#$minilang['fr']['icon']['russe'] = "views/images/p_russe.png";
#$minilang['fr']['icon']['chinois'] = "views/images/p_chinois.png";
#$minilang['fr']['icon']['arabe'] = "views/images/p_arabe.png";
#$minilang['fr']['icon']['hebreux'] = "views/images/p_hebreux.png";
#$minilang['fr']['icon']['japonais'] = "views/images/p_japonais.png";


// List.php
$list['fr']['events']['empty'] = "Aucun événement Gozpeak pour ces critères de recherche";
$list['fr']['ideas']['empty'] = "Aucune idée proposée pour ces critères de recherche";

$list['fr']['filter']['placeholder'] = "Filtrer par langues";
$list['fr']['filter']['submit'] = "Filtrer les événements";
$list['fr']['yearpicker']['text'] = "Année";
$list['fr']['monthpicker']['text'] = "Mois";


$list['fr']['monthpicker']['option'][0]['entry'] = "Janvier";
$list['fr']['monthpicker']['option'][0]['value'] = "01";
$list['fr']['monthpicker']['option'][1]['entry'] = "Février";
$list['fr']['monthpicker']['option'][1]['value'] = "02";
$list['fr']['monthpicker']['option'][2]['entry'] = "Mars";
$list['fr']['monthpicker']['option'][2]['value'] = "03";
$list['fr']['monthpicker']['option'][3]['entry'] = "Avril";
$list['fr']['monthpicker']['option'][3]['value'] = "04";
$list['fr']['monthpicker']['option'][4]['entry'] = "Mai";
$list['fr']['monthpicker']['option'][4]['value'] = "05";
$list['fr']['monthpicker']['option'][5]['entry'] = "Juin";
$list['fr']['monthpicker']['option'][5]['value'] = "06";
$list['fr']['monthpicker']['option'][6]['entry'] = "Juillet";
$list['fr']['monthpicker']['option'][6]['value'] = "07";
$list['fr']['monthpicker']['option'][7]['entry'] = "Août";
$list['fr']['monthpicker']['option'][7]['value'] = "08";
$list['fr']['monthpicker']['option'][8]['entry'] = "Septembre";
$list['fr']['monthpicker']['option'][8]['value'] = "09";
$list['fr']['monthpicker']['option'][9]['entry'] = "Octobre";
$list['fr']['monthpicker']['option'][9]['value'] = "10";
$list['fr']['monthpicker']['option'][10]['entry'] = "Novembre";
$list['fr']['monthpicker']['option'][10]['value'] = "11";
$list['fr']['monthpicker']['option'][11]['entry'] = "Décembre";
$list['fr']['monthpicker']['option'][11]['value'] = "12";


?>
