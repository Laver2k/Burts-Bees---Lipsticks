<?php include('../../includes/config.php');

$feedback = "";


//Data collection - Put the values receieved here
$submittedRecipientName = strip_tags(trim($_POST["recipient-name"]));
$submittedRecipientName = str_replace(array("\r","\n"),array(" "," "),$submittedRecipientName);
$submittedRecipientEmail = strip_tags(trim($_POST["recipient-email"]));
$submittedRecipientEmail = str_replace(array("\r","\n"),array(" "," "),$submittedRecipientEmail);

$submittedSenderName = strip_tags(trim($_POST["sender-name"]));
$submittedSenderName = str_replace(array("\r","\n"),array(" "," "),$submittedSenderName);
$submittedSenderEmail = strip_tags(trim($_POST["sender-email"]));
$submittedSenderEmail = str_replace(array("\r","\n"),array(" "," "),$submittedSenderEmail);

$card = strip_tags(trim($_POST["chosen-card"]));
$fontColour = strip_tags(trim($_POST["chosen-font"]));
$lipstickPrint = strip_tags(trim($_POST["chosen-lipstick"]));
$message = strip_tags(trim($_POST["chosen-message"]));
$cardId = strip_tags(trim($_POST["card-id"]));

//Sanitize for database input - addslashes to each typed input for security.
$submittedRecipientName = addslashes($submittedRecipientName);
$submittedRecipientEmail = addslashes($submittedRecipientEmail);
$submittedSenderName = addslashes($submittedSenderName);
$submittedSenderEmail = addslashes($submittedSenderEmail);

$card = addslashes($card);
$fontColour = addslashes($fontColour);
$lipstickPrint = addslashes($lipstickPrint);
$cardId = addslashes($cardId);


//Error checking - errors are stored in the $feedback variable

if ($_SERVER["REQUEST_METHOD"] == "POST") { //Only process a form if it has been posted.

  if ($submittedRecipientName=="" || strlen($submittedRecipientName)<1 || strlen($submittedRecipientName)>50) {
    $feedback .= "Please enter a valid recipient name.<br/>";
  }

  if ($submittedRecipientEmail=="" || strlen($submittedRecipientEmail)<1 || strlen($submittedRecipientEmail)>50) {
    $feedback .= "Please enter a valid recipient email.<br/>";
  }


  if ($submittedSenderName=="" || strlen($submittedSenderName)<1 || strlen($submittedSenderName)>50) {
    $feedback .= "Please enter a valid recipient name.<br/>";
  }

  if ($submittedSenderEmail=="" || strlen($submittedSenderEmail)<1 || strlen($submittedSenderEmail)>50) {
    $feedback .= "Please enter a valid recipient email.<br/>";
  }


  if (!isValidEmail($submittedSenderEmail) || strlen($submittedSenderEmail)<3 || strlen($submittedSenderEmail)>50 ) {
      $feedback .= "Your email address is not valid.<br/>";
  }

  if (!isValidEmail($submittedRecipientEmail) || strlen($submittedRecipientEmail)<3 || strlen($submittedRecipientEmail)>50 ) {
      $feedback .= "The recipient's email address entered is not valid.<br/>";
  }


  if ($feedback =="") {
   sendEmail($submittedRecipientName, $submittedRecipientEmail, $submittedSenderName, $submittedSenderEmail, $cardId);
  }

  echo $feedback; //This is sent back to the jQuery Ajax call

}


function isValidEmail($email){
  return filter_var($email, FILTER_VALIDATE_EMAIL);
}


//Sends the $recipient an email.
function sendEmail($submittedRecipientName, $submittedRecipientEmail, $submittedSenderName, $submittedSenderEmail, $cardId) {
  global $country;

  if ($country == "uk") {
    $url = "http://lipstick.burtsbees.co.uk";
  } else {
    $url = "http://lipstick.burtsbees.com.au";
  }

  $emailContent = file_get_contents('../../includes/emails/card-'.$country.'.html');
  $emailContent = str_replace("[sender]", $submittedSenderName, $emailContent);
  $emailContent = str_replace("[card-id]", $url."/card-display.php?id=".$cardId, $emailContent);

  sendMail($submittedRecipientName, $submittedRecipientEmail, "You've received a Burt's Bees Discount Code", $emailContent, '', 1);

}
