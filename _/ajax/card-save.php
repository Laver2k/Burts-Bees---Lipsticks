<?php include('../../includes/config.php'); 

$feedback = "";

$card = strip_tags(trim($_POST["chosen-card"]));
$fontColour = strip_tags(trim($_POST["chosen-font"]));
$lipstickPrint = strip_tags(trim($_POST["chosen-lipstick"]));
$message = strip_tags(trim($_POST["chosen-message"]));

$card = addslashes($card);
$fontColour = addslashes($fontColour);
$lipstickPrint = addslashes($lipstickPrint);

if ($_SERVER["REQUEST_METHOD"] == "POST") { //Only process a form if it has been posted.

  if ($feedback =="") {
    //Insert to users table
    $sql = "INSERT INTO cards (card, fontColour, lipstickPrint, message, time) VALUES (:card, :fontColour, :lipstickPrint, :message, NOW())";
    $query = $dbh->prepare($sql);

    $query->execute(array(
      ':card' => $card,
      ':fontColour' => $fontColour,
      ':lipstickPrint' => $lipstickPrint,
      ':message' => $message
    ));
  } 

echo $dbh->lastInsertId(); 

}



