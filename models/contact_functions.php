<?php

function check_contact_exists($DB, $contact_email, $contact_subject, $contact_date) {
	$req = $DB->prepare("SELECT COUNT(contact_subject) FROM contact_stats where contact_email = :contact_email AND contact_subject = :contact_subject AND contact_date = :contact_date");
	$req -> execute(array(':contact_email'=>$contact_email, ':contact_subject'=>$contact_subject, ':contact_date'=>$contact_date));
	$contactentry = $req->fetchColumn();
	$req->closeCursor();
	return ($contactentry);
}

function register_contacts_stats($DB, $contact_data) {
	$req = $DB->prepare('INSERT INTO contact_stats (contact_name, contact_email, contact_subject, contact_message, contact_date) VALUES (?, ?, ?, ?, ?)');
  $req->execute($contact_data);
  $req->closeCursor();
}

?>
