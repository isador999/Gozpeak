<?php

function send_by_mailgun($email,$subject,$msg) {
	 $api_key="key-d63020f29a13791a9757e14e749478df";       /* Api Key got from https://mailgun.com/cp/my_account */
	 $domain="gozpeak.com";   				/* Domain Name you given to Mailgun */
         $address="info@gozpeak.com";
	 $ch = curl_init();
	 curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
	 curl_setopt($ch, CURLOPT_USERPWD, 'api:'.$api_key);
	 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	 curl_setopt($ch, CURLOPT_HEADER, 1);
         curl_setopt ($ch, CURLOPT_VERBOSE, 0);
	 curl_setopt ($ch, CURLOPT_MAXREDIRS, 3);
	 curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
	 curl_setopt($ch, CURLOPT_URL, 'https://api.mailgun.net/v3/'.$domain.'/messages');
	 curl_setopt($ch, CURLOPT_HEADER, false);
	 #curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	 # "From: $email",
	 # "Reply-To: info@gozpeak.com",
	 # "MIME-Version: 1.0",
	 # "Content-type: text/plain; charset=utf-8",
	 # "Content-Transfer-Encoding: quoted-printable"));
	 curl_setopt($ch, CURLOPT_POSTFIELDS, array(
	  'from' 			 => "Equipe Gozpeak <$address>",
  	  'to' 				 => "$email",
	  'h:Reply-To' 			 => "<$address>",
	  'h:MIME-Version'		 => "1.0",
	  #'h:Content-Type'		 => "text/html; charset=UTF-8",
	  'h:Content-Type' 		 => "multipart/related; boundary='boundary-example'; type='text/html'",
	  'h:Content-Transfer-Encoding'  => "quoted-printable",
  	  'subject' 			 => "$subject",
  	  'html' 			 => "$msg"
 	));
     $result = curl_exec($ch);
     curl_close($ch);
     return $result;
}

?>
