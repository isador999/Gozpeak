<?php

//$dest = "root@localhost";
//$subject = "Bonjour ! ";
//$body = "Corps du mail, test via PHP !";

//mail("$dest", "$subject", "$body");

$email = "root@localhost";

$Name = "myname"; //senders name
            $email_sender = "root@localhost"; //senders e-mail adress
            $recipient = $email; //recipient
            $mail_body = "The text for the mail..."; //mail body
            $subject = "Subject for reviever"; //subject
            $header = "From: ". $Name . " <" . $email_sender . ">\r\n"; 
                        $status = mail($recipient, $subject, $mail_body, $header); 
            print('ENVOI '. $status);

?>
