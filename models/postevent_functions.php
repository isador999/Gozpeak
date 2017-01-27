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

function get_idea_id($DB, $idea_name) {
  $req = $DB->prepare("SELECT id from ideas where ideaname = " . $DB->quote($idea_name));
  $req->execute();
  $idea_id = $req->fetchColumn();
  $req->closeCursor();
  return $idea_id;
}

function add_idea($DB, $d) {
  $req = $DB->prepare('INSERT INTO ideas (organizer, ideaname, ideaplace, ideadesc, ideadatetime, ideaphone, language, level_language, ideatype) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');
  $req->execute($d);
  $req->closeCursor();
}


function update_existant_idea($DB, $organizer, $ideaname, $ideaplace, $ideadesc, $ideadatetime, $ideaphone, $language, $level_language, $ideatype, $idea_id) {
  //$idea_id = intval($idea_id);

  settype($idea_id, "integer");
  $req = $DB->prepare("UPDATE ideas SET organizer = " . $DB->quote($organizer) . ",
                                       ideaname = " . $DB->quote($ideaname) . ",
                                       ideaplace = " . $DB->quote($ideaplace) . ",
                                       ideadesc = " . $DB->quote($ideadesc) . ",
                                       ideadatetime = " . $DB->quote($ideadatetime) . ",
                                       ideaphone = " . $DB->quote($ideaphone) . ",
                                       language = " . $DB->quote($language) . ",
                                       level_language = " . $DB->quote($level_language) . "
                                       where id = " . $idea_id);
  $req->execute();
  $req->closeCursor();
}


# where ideatype = " . $DB->quote($ideatype) . " AND id = " . $idea_id);
// function update_existant_idea($DB, $data, $eventid) {
//   try {
//   $req = $DB->prepare("UPDATE ideas set organizer = ':organizer',
//                                         ideaname = ':ideaname',
//                                         ideaplace = ':ideaplace',
//                                         ideadesc = ':ideadesc',
//                                         ideadatetime = ':ideadatetime',
//                                         ideaphone = ':ideaphone',
//                                         language = ':language',
//                                         level_language = ':level_language'
//                                           where id = '$eventid'");
//   } catch (PDOException $e) {
//     echo $e->getMessage();
//   }
//
//   try {
//     $req -> execute(array(':organizer'=>$data['organizer'],
//                         ':ideaname'=>$data['ideaname'],
//                         ':ideaplace'=>$data['ideaplace'],
//                         ':ideadesc'=>$data['ideadesc'],
//                         ':ideadatetime'=>$data['ideadatetime'],
//                         ':ideaphone'=>$data['ideaphone'],
//                         ':language'=>$data['language'],
//                         ':level_language'=>$data['level_language']));
//   } catch (PDOException $e) {
//     echo $e->getMessage();
//   }
//   $req->closeCursor();
// }


function get_mail_organizer ($DB, $organizer) {
  $req = $DB->prepare("SELECT email from members where pseudo = ?");
  $req -> execute(array($organizer));
  $mail_organizer = $req->fetchColumn();
  $req -> closeCursor();
  return ($mail_organizer);
}

?>
