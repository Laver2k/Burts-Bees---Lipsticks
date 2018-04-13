<?php
//If triggered from a CRON task, theres no HTTP_HOST
if (isset($_SERVER['HTTP_HOST'])) {
	$hostname = $_SERVER['HTTP_HOST'];
} else {
	$hostname = "lipstick.burtsbees.co.uk";
}

$dbh = connect($hostname);
$country = detectSite($hostname);


//Load translations
switch ($country) {
	case "uk":
	include('translations/uk.php');
	break;
	case "de":
	include('translations/de.php');
	break;
	case "aus":
	include('translations/aus.php');
	break;
}




$buyShadeLinks = getBuyShadeLinks($country);
include('sendgrid-php/SendGrid_loader.php');


//Country ID is used to populate a hidden field.
if ($country === "uk") {
	$countryID = 1;
	date_default_timezone_set('Atlantic/Cape_Verde'); //needed for accurate cron scheduling (Forcing a timezone thats an hour behind as our live server time is incorrect)
}

if ($country === "de") {
	$countryID = 2;
	date_default_timezone_set('Europe/Berlin'); //needed for accurate cron scheduling
}

if ($country === "aus") {
	$countryID = 3;
	date_default_timezone_set('Australia/Sydney'); //needed for accurate cron scheduling
}

//We need the current hour and day so that we can work out which 8-hour slot is active.
$currentHour = date('H');
$currentDay = date('Y')."/".date('m')."/".date('d');
if ($currentHour >= 0 && $currentHour <=6) { //its between 00:00 and 08:00
	$endTime = "08:00:00";
	$slotID = 1;
}
if ($currentHour >= 7 && $currentHour <=14) { //its between 08:00 and 16:00
	$endTime = "16:00:00";
	$slotID = 2;
}
if ($currentHour >= 15 && $currentHour <=22) { //its between 16:00 and 00:00
	$endTime = "23:59:59";
	$slotID = 3;
}
$lipsticksAvailable = areLipsticksAvailable($country);


//Database connection
function connect($hostname){
//Emptied for security
}

//Use the URL ($hostname) to work out the country.
function detectSite($hostname) {

	switch($hostname) {
		case "xcetras-imac.local:5757":
			return "uk";
			break;
		case "lipstick.burtsbees.com.au":
			return "aus";
			break;
		case "lipstick.burtsbees.de":
			return "de";
			break;
		default:
			return "uk";
	}
}

//Output a style sheet link thats specific to site's country.
function countryCSSSheet($country) {
	if ($country == "uk") {
		return;
	}
	echo "<link rel='stylesheet' href='_/css/adjustments-".$country.".css'>";
}

//Use within an image path to include '/de/' or '/aus/' for country specific ammendments.
function imageDirectory($country) {
	if ($country=="aus") {
		echo "aus/";
	}
	if ($country=="de") {
		echo "de/";
	}
}

//Output a logo thats specific to site's country.
function countryHomeLogo($country) {

	if ($country == "uk") {
		echo '<a href="https://www.burtsbees.co.uk"><img src="img/layout/logo.png" id="logo" alt="Burts Bees logo"></a>';
	}
	if ($country == "de") {
		echo '<a href="http://www.burtsbees.de/"><img src="img/layout/logo.png" id="logo" alt="Burts Bees logo"></a>';
	}
	if ($country == "aus") {
		echo '<a href="https://www.burtsbees.com.au/"><img src="img/layout/logo.png" id="logo" alt="Burts Bees logo"></a>';
	}
	echo "<link rel='stylesheet' href='_/css/adjustments-".$country.".css'>";
}

//Output different social buttons for each country
function outputFooterSocialLinks ($country) {
	if ($country=="uk") {
		echo '
	    <a href="https://www.facebook.com/BurtsBeesUK" target="_blank"><img src="img/layout/icon-facebook.png" alt="Facebook"></a>
	    <a href="https://www.instagram.com/burtsbeesuk" target="_blank"><img src="img/layout/icon-instagram.png" alt="Instagram"></a>
	    <a href="http://twitter.com/#!/BurtsBeesUK" target="_blank"><img src="img/layout/icon-twitter.png" alt="Twitter"></a>
	    <a href="http://www.youtube.com/user/BurtsBeesUK" target="_blank"><img src="img/layout/icon-youtube.png" alt="Youtube"></a>
		';
	}
	if ($country=="aus") {
		echo '
	    <a href="http://www.facebook.com/BurtsBeesAus" target="_blank"><img src="img/layout/icon-facebook.png" alt="Facebook"></a>
	    <a href="https://www.instagram.com/burtsbeesaus/" target="_blank"><img src="img/layout/icon-instagram.png" alt="Instagram"></a>
	    <a href="https://twitter.com/#!/BurtsBeesAus" target="_blank"><img src="img/layout/icon-twitter.png" alt="Twitter"></a>
	    <a href="https://www.youtube.com/channel/UC-ZY7PYHsKAylk2wDeuXA-A" target="_blank"><img src="img/layout/icon-youtube.png" alt="Youtube"></a>
		';
	}
	if ($country=="de") {
		echo '
	    <a href="https://www.facebook.com/BurtsBeesDeutschland" target="_blank"><img src="img/layout/icon-facebook.png" alt="Facebook"></a>
	    <a href="https://www.instagram.com/burtsbeesde/" target="_blank"><img src="img/layout/icon-instagram.png" alt="Instagram"></a>
	    <a href="http://twitter.com/#!/BurtsBeesUK" target="_blank"><img src="img/layout/icon-twitter.png" alt="Twitter"></a>
	    <a href="http://www.youtube.com/user/BurtsBeesUK" target="_blank"><img src="img/layout/icon-youtube.png" alt="Youtube"></a>
		';
	}
}


//Output navigation links for different countries
function outputCountryNavLinks($country) {
	if ($country=="uk") {
		echo '
	    <li><a href="https://www.burtsbees.co.uk/natural-products/lips-lip-colour/" target="_blank">Lip colour</a></li>
	    <li><a href="https://www.burtsbees.co.uk/natural-products/lips-lip-care/" target="_blank">lip care</a></li>
	    <li><a href="https://www.burtsbees.co.uk/natural-products/face-care/" target="_blank">face</a></li>
	    <li><a href="https://www.burtsbees.co.uk/natural-products/body/" target="_blank">body</a></li>
	    <li><a href="https://www.burtsbees.co.uk/natural-products/baby-and-mama/" target="_blank">baby</a></li>
	    <li><a href="https://www.burtsbees.co.uk/classics/" target="_blank">classics</a></li>
	    <li><a href="https://www.burtsbees.co.uk/natural-products/more/" target="_blank">more</a></li>
	    <li><a href="https://www.burtsbees.co.uk/natural-products/gifts-and-kits/" target="_blank">gifts</a></li>
	    <li><a href="https://www.burtsbees.co.uk/natural-products/what-s-new/" target="_blank">what’s new</a></li>
	    <li><a href="https://www.burtsbees.co.uk/natural-products/sale/" target="_blank">sale</a></li>
		';
	}
	if ($country=="aus") {
		echo '
	    <li><a href="https://www.burtsbees.com.au/natural-products/lips-lip-colour/" target="_blank">Lip colour</a></li>
	    <li><a href="https://www.burtsbees.com.au/natural-products/lips-lip-care/" target="_blank">lip care</a></li>
	    <li><a href="https://www.burtsbees.com.au/natural-products/face-care/" target="_blank">face</a></li>
	    <li><a href="https://www.burtsbees.com.au/natural-products/body/" target="_blank">body</a></li>
	    <li><a href="https://www.burtsbees.com.au/natural-products/baby-and-mama/" target="_blank">baby</a></li>
	    <li><a href="https://www.burtsbees.com.au/classics/" target="_blank">classics</a></li>
	    <li><a href="https://www.burtsbees.com.au/natural-products/gifts-and-kits/" target="_blank">gifts</a></li>
	    <li><a href="https://www.burtsbees.com.au/natural-products/sale/" target="_blank">sale</a></li>
		';
	}
	if ($country=="de") {
		echo '
	    <li><a href="http://www.burtsbees.de/kategorie/lippen-farbe/" target="_blank">LIPPENFARBE</a></li>
	    <li><a href="http://www.burtsbees.de/kategorie/lippenpflege/" target="_blank">LIPPENFLEGE</a></li>
	    <li><a href="http://www.burtsbees.de/gesichtspflege/" target="_blank">GESICHTSPFLEGE</a></li>
	    <li><a href="http://www.burtsbees.de/k-rperpflege/" target="_blank">KÖRPERPFLEGE</a></li>
	    <li><a href="http://www.burtsbees.de/kategorie/h-nde-f-e/" target="_blank">HÄNDE & FÜßE</a></li>
	    <li><a href="http://www.burtsbees.de/kategorie/mutter-baby/" target="_blank">MUTTER UND BABY</a></li>
	    <li><a href="http://www.burtsbees.de/classics" target="_blank">CLASSICS</a></li>
	    <li><a href="http://www.burtsbees.de/kategorie/pflege-sets//" target="_blank">PFLEGE-SETS</a></li>
		';
	}
}


//Output footer links for different countries
function outputFooterLinks($country) {
	if ($country=="uk") {
		echo '
	    <li><a href="https://www.burtsbees.co.uk/w/about-us/our-story/" target="_blank">Our Story</a></li>
	    <li><a href="https://www.burtsbees.co.uk/w/about-us/our-nature/" target="_blank">Our Nature</a></li>
	    <li><a href="https://www.burtsbees.co.uk/w/about-us/sustainability/" target="_blank">Sustainability</a></li>
	    <li><a href="https://www.burtsbees.co.uk/w/wild-for-bees/" target="_blank">Wild for Bees</a></li>
		';
	}
	if ($country=="aus") {
		echo '
	    <li><a href="https://www.burtsbees.com.au/w/about-us/our-story/" target="_blank">Our Story</a></li>
	    <li><a href="https://www.burtsbees.com.au/w/about-us/our-nature/" target="_blank">Our Nature</a></li>
	    <li><a href="https://www.burtsbees.com.au/w/about-us/sustainability/" target="_blank">Sustainability</a></li>
		';
	}
	if ($country=="de") {
		echo '
	    <li><a href="http://www.burtsbees.de/w/uuml-ber-uns/unsere-geschichte/" target="_blank">Unsere Geschichte</a></li>
	    <li><a href="http://www.burtsbees.de/w/uuml-ber-uns/unsere-welt/" target="_blank">Unsere Welt</a></li>
	    <li><a href="http://www.burtsbees.de/w/uuml-ber-uns/nachhaltigkeit/" target="_blank">Nachhaltigkeit</a></li>
	    <li><a href="http://www.burtsbees.de/w/wild-for-bees/" target="_blank">Verrückt nach Bienen</a></li>
	    <li><a href="lipstick-terms-de.php" target="_blank">Teilnahmebedingungen</a></li>
		';
	}
}


//Looks up how many lipsticks remain for the provided $country.
function areLipsticksAvailable($country) {
	$sql = "SELECT lipsticksLeft FROM lipsticks WHERE country = '{$country}'";
	  $queryResults = $GLOBALS["dbh"]->prepare($sql);
	  $queryResults->execute();
	  if ($queryResults->rowCount()>0) {
	    foreach ($queryResults as $row) {
	       return $row['lipsticksLeft'];
	    }
	  } 
}

//Sends an email using Sendgrid
function sendMail($toName, $toEmail, $subject, $htmlMessage, $plainMessage, $countryID){
	$sendgrid = new SendGrid('','');
	$mail = new SendGrid\Mail();

	if($countryID == 1) {
		$fromName = "Burt's Bees";
		$fromEmail = 'donotreply@burtsbees.co.uk';
	}

	if($countryID == 2) {
		$fromName = "Burt's Bees";
		$fromEmail = 'donotreply@burtsbees.co.uk';
	}

	if($countryID == 3) {
		$fromName = "Burt's Bees";
		$fromEmail = 'donotreply@burtsbees.co.uk';
	}

	$mail->setFrom($fromEmail)->setFromName($fromName)->setReplyTo($fromEmail);
	// Custom unsubscribe link
	$mail->addFilterSetting('subscriptiontrack', 'enable', 1);
	$mail->addFilterSetting('subscriptiontrack', 'text/html', "If you don't want to receive any more emails, you can <%block them%>.");
	$mail->addTo($toEmail, $toName);

	$mail->setSubject($subject)->
	  setHTML(nl2br($htmlMessage))->
	  setText($plainMessage)->
	  addSubstitution("%name%", [$toName]);
	  
	$response = $sendgrid->smtp->send($mail);

}

function getBuyShadeLinks($country){
	if ($country == "uk"){
		return ["https://www.burtsbees.co.uk/natural-products/lips-lip-colour/lipstick.html?itemId=1000000136489", "https://www.burtsbees.co.uk/natural-products/lips-lip-colour/lipstick.html?itemId=1000000136487", "https://www.burtsbees.co.uk/natural-products/lips-lip-colour/lipstick.html?itemId=1000000136488", "https://www.burtsbees.co.uk/natural-products/lips-lip-colour/lipstick.html?itemId=1000000136492", "https://www.burtsbees.co.uk/natural-products/lips-lip-colour/lipstick.html?itemId=1000000136499", "https://www.burtsbees.co.uk/natural-products/lips-lip-colour/lipstick.html?itemId=1000000136493", "https://www.burtsbees.co.uk/natural-products/lips-lip-colour/lipstick.html?itemId=1000000136484", "https://www.burtsbees.co.uk/natural-products/lips-lip-colour/lipstick.html?itemId=1000000136498", "https://www.burtsbees.co.uk/natural-products/lips-lip-colour/lipstick.html?itemId=1000000136497", "https://www.burtsbees.co.uk/natural-products/lips-lip-colour/lipstick.html?itemId=1000000136486", "https://www.burtsbees.co.uk/natural-products/lips-lip-colour/lipstick.html?itemId=1000000136495", "https://www.burtsbees.co.uk/natural-products/lips-lip-colour/lipstick.html?itemId=1000000136496", "https://www.burtsbees.co.uk/natural-products/lips-lip-colour/lipstick.html?itemId=1000000136500", "https://www.burtsbees.co.uk/natural-products/lips-lip-colour/lipstick.html?itemId=1000000136501", "https://www.burtsbees.co.uk/natural-products/lips-lip-colour/lipstick.html?itemId=1000000136491", "https://www.burtsbees.co.uk/natural-products/lips-lip-colour/lipstick.html?itemId=1000000136485", "https://www.burtsbees.co.uk/natural-products/lips-lip-colour/lipstick.html?itemId=1000000136490", "https://www.burtsbees.co.uk/natural-products/lips-lip-colour/lipstick.html?itemId=1000000136494"];
	}
	if ($country == "de"){
		return ["http://burtsbees.de/kategorie/lippen-farbe/lippenstift.html", "http://burtsbees.de/kategorie/lippen-farbe/lippenstift.html", "http://burtsbees.de/kategorie/lippen-farbe/lippenstift.html", "http://burtsbees.de/kategorie/lippen-farbe/lippenstift.html", "http://burtsbees.de/kategorie/lippen-farbe/lippenstift.html", "http://burtsbees.de/kategorie/lippen-farbe/lippenstift.html", "http://burtsbees.de/kategorie/lippen-farbe/lippenstift.html", "http://burtsbees.de/kategorie/lippen-farbe/lippenstift.html", "http://burtsbees.de/kategorie/lippen-farbe/lippenstift.html", "http://burtsbees.de/kategorie/lippen-farbe/lippenstift.html", "http://burtsbees.de/kategorie/lippen-farbe/lippenstift.html", "http://burtsbees.de/kategorie/lippen-farbe/lippenstift.html", "http://burtsbees.de/kategorie/lippen-farbe/lippenstift.html", "http://burtsbees.de/kategorie/lippen-farbe/lippenstift.html", "http://burtsbees.de/kategorie/lippen-farbe/lippenstift.html", "http://burtsbees.de/kategorie/lippen-farbe/lippenstift.html", "http://burtsbees.de/kategorie/lippen-farbe/lippenstift.html", "http://burtsbees.de/kategorie/lippen-farbe/lippenstift.html"];
	}
	if ($country == "aus"){
		return ["http://burtsbees.com.au/natural-products/lips-lip-colour/lipstick.html?itemId=1000000130492", "#2", "http://burtsbees.com.au/natural-products/lips-lip-colour/lipstick.html?itemId=1000000130491", "http://burtsbees.com.au/natural-products/lips-lip-colour/lipstick.html?itemId=1000000130498", "http://burtsbees.com.au/natural-products/lips-lip-colour/lipstick.html?itemId=1000000130496", "http://burtsbees.com.au/natural-products/lips-lip-colour/lipstick.html?itemId=1000000130499", "http://burtsbees.com.au/natural-products/lips-lip-colour/lipstick.html?itemId=1000000130489", "http://burtsbees.com.au/natural-products/lips-lip-colour/lipstick.html?itemId=1000000130495", "http://burtsbees.com.au/natural-products/lips-lip-colour/lipstick.html?itemId=1000000130502", "#10", "http://burtsbees.com.au/natural-products/lips-lip-colour/lipstick.html?itemId=1000000130500", "http://burtsbees.com.au/natural-products/lips-lip-colour/lipstick.html?itemId=1000000130501", "http://burtsbees.com.au/natural-products/lips-lip-colour/lipstick.html?itemId=1000000130497", "#14", "http://burtsbees.com.au/natural-products/lips-lip-colour/lipstick.html?itemId=1000000130494", "http://burtsbees.com.au/natural-products/lips-lip-colour/lipstick.html?itemId=1000000130490", "http://burtsbees.com.au/natural-products/lips-lip-colour/lipstick.html?itemId=1000000130493", "#18"];
	}
}









