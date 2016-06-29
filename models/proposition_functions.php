<?php


function insert_event($DB, $event_fields) {
        $req = $DB->prepare('INSERT INTO events (organizer, language, eventname, eventdesc, eventtype, eventplace, eventdate, eventhour, eventminutes) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');
        $req->execute($event_fields);
        $req->closeCursor();
}


function insert_idea($DB, $idea_fields) {
        $req = $DB->prepare('INSERT INTO ideas (organizer, language, ideaname, ideadesc, ideatype, ideaplace, ideadate, ideahour, ideaminutes) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');
        $req->execute($idea_fields);
        $req->closeCursor();
}


?>
