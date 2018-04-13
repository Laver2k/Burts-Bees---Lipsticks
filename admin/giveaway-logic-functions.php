<?php
logMessage("Request to send out prizes received");

//utility - Puts the provided $message into the log table.
function logMessage($message) {
    $sql = "INSERT INTO log (description, time) VALUES (:message, NOW())";
    $query = $GLOBALS["dbh"]->prepare($sql);
    $query->execute(array(
      ':message' => $message
    ));
}

// Takes a date and a slotID, returns if the winners have already been selected or not.
function areWinnersAlreadySelected($date, $countryID, $slotID) {
  $sql = "SELECT * FROM entries WHERE date = '{$date}' AND slotID={$slotID} AND win=1 AND countryID={$countryID}";
  $queryResults = $GLOBALS["dbh"]->prepare($sql);
  $queryResults->execute();
  if ($queryResults->rowCount()>0) {
    foreach ($queryResults as $row) {
       return true;
    }
  } else {
    return false;
  }
}

//If the compeition is running for the provided country, select random winners from the entries table.
function selectWinners($countryID, $slotID){
  global $currentDate, $lipsticksToGiveAway, $ukActive, $deActive, $ausActive;

  // Only select winners if the compeititon is active in that country.
  if ($ukActive == false && $countryID==1) { return; }
  if ($deActive == false && $countryID==2) { return; }
  if ($ausActive == false && $countryID==3) { return; }


  $sql = "SELECT * FROM entries INNER JOIN users ON entries.userID=users.userID  WHERE entries.date = '{$currentDate}' AND entries.countryID={$countryID} AND entries.slotID={$slotID}  ORDER BY RAND() LIMIT {$lipsticksToGiveAway}";
  $queryResults = $GLOBALS["dbh"]->prepare($sql);
  $queryResults->execute();
  processResults($queryResults, $countryID);
}


//Takes an executed query containing the winners list and loops through each winner, awarding them a prize.
function processResults($query, $countryID) {

  if ($query->rowCount()>0) {
    logMessage($query->rowCount()." winners selected and awarded prizes");

    foreach ($query as $row) {
       givePrize($row['entryID'], $row['email'], $row['fname'], $countryID);
    } 

  } else {
      logMessage("No prizes awarded.  Entries are unavailable for this period for country ID ".$countryID);
    }

}


//Flag an entry as a winning one.
function givePrize($entryID, $email, $name, $countryID) {
  //echo $entryID."<br/>";

  if($countryID==1) {$country="uk";}
  if($countryID==2) {$country="de";}
  if($countryID==3) {$country="aus";}

  $sql = "UPDATE entries SET win=1 WHERE entryID={$entryID}";
  $prizeQuery = $GLOBALS["dbh"]->prepare($sql);
  $prizeQuery->execute();

  $lipsticksLeftsql = "UPDATE lipsticks SET lipsticksLeft = lipsticksLeft -1 WHERE country='{$country}'";
  $lipsticksQuery = $GLOBALS["dbh"]->prepare($lipsticksLeftsql);
  $lipsticksQuery->execute();

  //sendPrizeEmail($name, $email, $countryID); //Send the winner an email
}


//Sends the $recipient an email.
function sendPrizeEmail($recipientName, $recipientEmail, $countryID) {
  if ($countryID==1) {
    $emailContent = file_get_contents('../includes/emails/winner-email-uk.html');
  }
  if ($countryID==2) {
    $emailContent = file_get_contents('../includes/emails/winner-email-de.html');
  }
  if ($countryID==3) {
    $emailContent = file_get_contents('../includes/emails/winner-email-aus.html');
  }
  sendMail($recipientName, $recipientEmail, "Congratulations!  You've won a lipstick that loves you back.", $emailContent, '', $countryID);
  logMessage("Email sent to ".$recipientEmail);
}






