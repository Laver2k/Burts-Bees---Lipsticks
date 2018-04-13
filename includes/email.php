<?php

//if (!isset($_POST['url'])) exit;

include('sendgrid-php/SendGrid_loader.php');
$sendgrid = new SendGrid('','');

$mail = new SendGrid\Mail();

//testing variables
$from_name = 'martin@weareready.com';
$from_email = 'martin@test.com';

$to_name = 'martin@test.com';
$to_email = 'martin@test.com';

$htmlMessage = "This is the HTML content for the email";
$plainMessage = "Here is the plain text version";

$mail->setFrom($from_email)->setFromName($from_name)->setReplyTo($from_email);

// Custom unsubscribe link
$mail->addFilterSetting('subscriptiontrack', 'enable', 1);
$mail->addFilterSetting('subscriptiontrack', 'text/html', "If you don't want to receive any more emails, you can <%block them%>.");

$mail->addTo($from_email, $from_name);

$mail->setSubject('BB Lipstick email test')->
  setHTML(nl2br($htmlMessage))->
  setText($plainMessage)->
  addSubstitution("%name%", [$to_name]);
  
$response = $sendgrid->smtp->send($mail);


?>