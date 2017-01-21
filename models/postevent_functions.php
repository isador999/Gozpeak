<?php

function pseudo_exist ($DB, $organizer) {
  $req = $DB->prepare("SELECT COUNT(pseudo) FROM members where pseudo = ?");
  $req -> execute(array($organizer));
  $nbre_pseudo = $req->fetchColumn();
  $req->closeCursor();
  return ($nbre_pseudo);
}

function idea_exist($DB, $idea_name) {
  $req = $DB->prepare("SELECT COUNT(ideaname) FROM ideas where ideaname = ?");
  $req -> execute(array($idea_name));
  $nbre_idea_name = $req->fetchColumn();
  $req->closeCursor();
  return ($nbre_idea_name);
}


function add_idea($DB, $d) {
  $req = $DB->prepare('INSERT INTO ideas (organizer, ideaname, ideaplace, ideadesc, ideadatetime, ideaphone, language, level_language, ideatype) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');
  $req->execute($d);
  $req->closeCursor();
}


function get_mail_organizer ($DB, $organizer) {
  $req = $DB->prepare("SELECT email from members where pseudo = ?");
  $req -> execute(array($organizer));
  $mail_organizer = $req->fetchColumn();
  $req -> closeCursor();
  return ($mail_organizer);
}

?>
