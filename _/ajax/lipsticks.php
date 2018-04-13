<?php include('../../includes/config.php'); 

//Data collection - Put the values receieved here
$submittedFirstName = strip_tags(trim($_POST["fname"]));
$submittedFirstName = str_replace(array("\r","\n"),array(" "," "),$submittedFirstName);
$submittedLastName = strip_tags(trim($_POST["lname"]));
$submittedLastName = str_replace(array("\r","\n"),array(" "," "),$submittedLastName);
$submittedEmail = strip_tags(trim($_POST["em"]));
$submittedPostcode = strip_tags(trim($_POST["postcode"]));
$submittedAddress = strip_tags(trim($_POST["address"]));
$countryID = strip_tags(trim($_POST["ctry-id"]));
$slotID = strip_tags(trim($_POST["slot-id"]));

if(isset($_POST["newsletter"])) {
$newsletter = 1;
} else {
$newsletter = 0;
}

//Sanitize for database input - addslashes to each typed input for security.
$submittedFirstName = addslashes($submittedFirstName);
$submittedLastName = addslashes($submittedLastName);
$submittedEmail = addslashes($submittedEmail);
$submittedPostcode = addslashes($submittedPostcode);
$submittedAddress = addslashes($submittedAddress);
$countryID = addslashes($countryID);
$slotID = addslashes($slotID);


//Error checking - errors are stored in the $feedback variable
$feedback = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") { //Only process a form if it has been posted.



  if ($submittedFirstName=="" || strlen($submittedFirstName)<1 || strlen($submittedFirstName)>50) {
    if($country=="de") {
      $feedback .= "Bitte geben Sie einen gültige Vornamen an.<br/>";
    } else {
      $feedback .= "Please enter a valid first name.<br/>";
    }

  }

  if ($submittedLastName=="" || strlen($submittedLastName)<1 || strlen($submittedLastName)>50) {
    if($country=="de") {
      $feedback .= "Bitte geben Sie einen gültigen Nachnamen an.<br/>";
    } else {
      $feedback .= "Please enter a valid last name.<br/>";
    }

  }


  if (!isValidEmail($submittedEmail) || strlen($submittedEmail)<3 || strlen($submittedEmail)>40 ) {

    if($country=="de") {
      $feedback .= "Die eingegebene E-Mail-Adresse ist ungültig.<br/>";
    } else {
      $feedback .= "The email address entered is not valid.<br/>";
    }

      
  }

  if (isEmailRegistered($submittedEmail)) {
    if($country=="de") {
      $feedback .= "Die E-Mail-Adresse ist bereits eingetragen<br/>";
    } else {
      $feedback .= "The email address has already entered the competition<br/>";
    }
      
  }


  if ($submittedPostcode=="" || strlen($submittedPostcode)<1 || strlen($submittedPostcode)>10) {
    if($country=="de") {
      $feedback .= "Bitte geben Sie eine gültige Postleitzahl an.<br/>";
    } else {
      $feedback .= "Please enter a valid post code.<br/>";
    }
    
  }


  if ($submittedAddress=="" || strlen($submittedAddress)<1 || strlen($submittedAddress)>200) {
    if($country=="de") {
      $feedback .= "Bitte geben Sie eine gültige Adresse an.<br/>";
    } else {
      $feedback .= "Please enter a valid address.<br/>";
    }
  }

  if ($feedback =="") {
    //Insert to users table
    $sql = "INSERT INTO users (fname, lname, email, postcode, address, newsletter) VALUES (:fname, :lname, :email, :postcode, :address, :newsletter) ON DUPLICATE KEY UPDATE email=email";
    $query = $dbh->prepare($sql);

    $query->execute(array(
      ':fname' => $submittedFirstName,
      ':lname' => $submittedLastName,
      ':email' => $submittedEmail,
      ':postcode' => $submittedPostcode,
      ':address' => $submittedAddress,
      ':newsletter' => $newsletter
    ));
    //Insert to entries table

    $sql = "INSERT INTO entries (userID, slotID, countryID, date, timeStamp, win) VALUES (LAST_INSERT_ID(), :slotID, :countryID, CURDATE(), NOW(), 0) ON DUPLICATE KEY UPDATE userID=userID";
    $query = $dbh->prepare($sql);

    $query->execute(array(
      ':slotID' => $slotID,
      ':countryID' => $countryID,
    ));

  } 

  echo $feedback; //This is sent back to the jQuery Ajax call

}


function isValidEmail($email){ 
  return filter_var($email, FILTER_VALIDATE_EMAIL);
}


function isEmailRegistered($email) {
  global $dbh;
  $sql = "SELECT count(email) AS timesRegistered FROM users WHERE email='{$email}'";

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