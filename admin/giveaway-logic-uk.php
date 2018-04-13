<?php 
if (!isset($_SERVER['HTTP_HOST'])) {
	include('/var/www/vhosts/vps01.digitalwithready.com/lipstick.burtsbees.co.uk/includes/config.php');
} else {
	include('../includes/config.php');
}
include('giveaway-logic-functions.php');

$lipsticksToGiveAway = 100;  //How many lipsticks are given away each day

if(areLipsticksAvailable("uk")>0) { //Is UK comp running?
  $ukActive = true; 
} else {
  $ukActive = false; 
  logMessage("UK has no more lipsticks to give away");
}

$currentDate = date("Y-m-d");
$currentHour = date("H");

//Use the current hour to determine which time slot it is.
if ($currentHour >= 0 && $currentHour <= 7) {
  $slotID = 1;
}
if ($currentHour >= 8 && $currentHour <= 15) {
  $slotID = 2;
}
if ($currentHour >= 16 && $currentHour <= 23) {
  $slotID = 3;
}

//Make sure that no emails have been sent for this slot on this day
if (areWinnersAlreadySelected($currentDate, $countryID, $slotID)==true) {
  logMessage("No winners selected for UK. Winners for slotID {$slotID} already selected for {$currentDate}");
  exit(); //If they have, stop.
}

//Select winners for UK
selectWinners(1, $slotID); //UK