<?php include('../../includes/config.php'); 

$feedback = "";


//Data collection - Put the values receieved here
$submittedFirstName = strip_tags(trim($_POST["fname"]));
$submittedFirstName = str_replace(array("\r","\n"),array(" "," "),$submittedFirstName);
$submittedLastName = strip_tags(trim($_POST["lname"]));
$submittedLastName = str_replace(array("\r","\n"),array(" "," "),$submittedLastName);
$submittedEmail = strip_tags(trim($_POST["consultation-em"]));
$submittedTime = "";




if(isset($_POST["location"])) {
  $submittedLocation = strip_tags(trim($_POST["location"]));
  $submittedLocation = str_replace(array("\r","\n"),array(" "," "),$submittedLocation);
} else {
  $feedback = "Select a city<br/>";
}


if(isset($_POST["consultation-date"])) {
  $submittedDate= strip_tags(trim($_POST["consultation-date"]));
  $submittedDate = str_replace(array("\r","\n"),array(" "," "),$submittedDate);
} else {
  $feedback = "Select a date<br/>";
}





if(isset($_POST["newsletter"])) {
$newsletter = 1;
} else {
$newsletter = 0;
}

//Sanitize for database input - addslashes to each typed input for security.
$submittedFirstName = addslashes($submittedFirstName);
$submittedLastName = addslashes($submittedLastName);
$submittedEmail = addslashes($submittedEmail);



//Error checking - errors are stored in the $feedback variable


if ($_SERVER["REQUEST_METHOD"] == "POST") { //Only process a form if it has been posted.



  if ($submittedFirstName=="" || strlen($submittedFirstName)<1 || strlen($submittedFirstName)>50) {
    $feedback .= "Please enter a valid first name.<br/>";
  }

  if ($submittedLastName=="" || strlen($submittedLastName)<1 || strlen($submittedLastName)>50) {
    $feedback .= "Please enter a valid last name.<br/>";
  }


  if (!isValidEmail($submittedEmail) || strlen($submittedEmail)<3 || strlen($submittedEmail)>40 ) {
      $feedback .= "The email address entered is not valid.<br/>";
  }

  if (isEmailRegistered($submittedEmail)) {
      $feedback .= "The email address has already registered<br/>";
  }

  if ($submittedDate=="select"){
    $feedback .= "Please enter a valid date.<br/>";
  }

  if ($feedback =="") {
    //Insert to users table
    $sql = "INSERT INTO consultations (fname, lname, email, city, time, date, newsletter) VALUES (:fname, :lname, :email, :city, :time, :date, :newsletter)";
    $query = $dbh->prepare($sql);

    $query->execute(array(
      ':fname' => $submittedFirstName,
      ':lname' => $submittedLastName,
      ':email' => $submittedEmail,
      ':city' => $submittedLocation,
      ':time' => $submittedTime,
      ':newsletter' => $newsletter,
      ':date' => $submittedDate
    ));

    sendConfirmationEmail($submittedFirstName." ".$submittedLastName, $submittedEmail, $submittedDate, $submittedTime, $submittedLocation);

  } 

  echo $feedback; //This is sent back to the jQuery Ajax call

}


function isValidEmail($email){ 
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}


function isEmailRegistered($email) {
  global $dbh;
    $sql = "SELECT count(email) AS timesRegistered FROM consultations WHERE email='{$email}'";

    $query = $dbh->prepare($sql);
    $query->execute();

    if ($query->rowCount()>0) {

      foreach ($query as $row) {
         if($row['timesRegistered'] > 0) {
            return true;
         }
      }
    }
}



//Sends the $recipient an email.
function sendConfirmationEmail($recipientName, $recipientEmail, $date, $time, $location) {

  if ($location == "manchester"){
    $location = "Manchester Trafford";
  }

  if ($location == "glasgow"){
    $location = "Glasgow Buchanan Galleries";
  }

  if ($location == "birmingham"){
    $location = "Birmingham Bullring";
  }

  $emailContent = file_get_contents('../../includes/emails/confirmation-email-uk.html');
  $emailContent = str_replace("[morning or afternoon]", $time, $emailContent);
  $emailContent = str_replace("[DD MMM]", $date, $emailContent);
  $emailContent = str_replace("[Location]", $location, $emailContent);
  sendMail($recipientName, $recipientEmail, "Your consultation with a Burt's Bees ambassador is booked!", $emailContent, '', 1);
}
