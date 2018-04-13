<?php include('includes/header.php'); ?>


<!-- Finally a lipstick that loves you back-->
<div class="section background-white background-clouds" id="section-hero">
  <div class="content">
    <div class="block" id="hero-part-1">
      <img src="img/home/<?php echo imageDirectory($country);?>lipstick-loves-you-back.png" id="loves-you-back" alt="hand drawn message">
      <img src="img/home/hero-woman.png" id="mobile-pouting-lady" alt="woman pouting">
      <img src="img/home/<?php echo imageDirectory($country);?>lipsticks.png" alt="new lipsticks" data-0="transform: translateY(0px);" data-100="transform: translateY(-50px);" id="hero-lipsticks">
    </div>
    <div class="block" id="hero-part-2">
      <img src="img/home/hero-woman.png" id="pouting-lady" alt="woman pouting">
    </div>
  </div>
</div>


<!-- Intense colour meets 8-hour moisture-->
<div class="section background-pink no-whitespace" id="section-moisture">
  <div class="content background-flowers">
    <div class="forty">
     	<img src="img/home/<?php echo imageDirectory($country);?>100-percent-natural.png" id="hundred-percent-natural" alt="100% natural">
     	<p id="moisture-summary"><?php echo $translations[0];?></p>
     	<a href="lipstick-range.php"><button type="button" id="discover-more"><?php echo $translations[1];?></button></a>
    </div>
    <div class="sixty">

        <?php
        //Lipstick needs to be moved differently because of the length of the german text.
        if($country=="de"){
          $offset = "25";
        }
        if($country=="uk" || $country=="aus" ){
          $offset = "0";
        }
        ?>

     	<img src="img/home/<?php echo imageDirectory($country);?>flower-lipsticks.png" id="lipstick-three-rows" alt="three rows of lipsticks" data-0="transform: translateY(500px);" data-700="transform: translateY(<?php echo $offset;?>px);" >
    </div>
  </div>
</div>


<!-- Win lipsticks every 8 hours -->
<?php
//If lipsticks still remain...
if ($lipsticksAvailable>0) {
?>
<div class="section background-yellow" id="section-win">
  <div class="content">
    <div class="half">
     	<img src="img/home/<?php echo imageDirectory($country);?>win-lipsticks.png" id="win-lipsticks" alt="win lipstick every 8 hours">
     	<p id="win-lipsticks-summary"><?php echo $translations[2];?></p>
    </div>
    <div class="half">
    	<span id="lipstick-countdown">00:00':00"</span>
      <input type="hidden" value="<?php echo $currentDay." ".$endTime;?>" id="dynamic-countdown"></input>
     	<button type="button" id="get-yours"><?php echo $translations[3];?></button>
    </div>
    
  </div>

  <!-- Popup form -->
  <div id="form-8hour">
    <img id="close-form" src="img/layout/close.png" alt="Close">
    <div id="form-wrapper">
      <div id="left-8hour">
        <img src="img/home/bubbles.png" id="form-bubbles" alt="Bubbles">
        <img src="img/home/<?php echo imageDirectory($country);?>8hr-modal-left-title.png" id="form-8hr-title" alt="Intense colour meet 8-hour moisture">
        <p><?php echo $translations[4];?></p>
        <p><?php echo $translations[5];?></p>

        <div id="form-social">
          <?php
            if($country == "uk"){
              $facebookLink = "http://www.facebook.com/sharer.php?u=http://lipstick.burtsbees.co.uk&t=#lipstickthatlovesyouback";
              $twitterLink = "http://twitter.com/intent/tweet?url=http://lipstick.burtsbees.co.uk&text=%23lipstickthatlovesyouback";
            }
            if($country == "de"){
              $facebookLink = "http://www.facebook.com/sharer.php?u=http://lipstick.burtsbees.de&t=#lipstickthatlovesyouback";
              $twitterLink = "http://twitter.com/intent/tweet?url=http://lipstick.burtsbees.de&text=%23lipstickthatlovesyouback";
            }
            if($country == "aus"){
              $facebookLink = "http://www.facebook.com/sharer.php?u=http://lipstick.burtsbees.com.au&t=#lipstickthatlovesyouback";
              $twitterLink = "http://twitter.com/intent/tweet?url=http://lipstick.burtsbees.com.au&text=%23lipstickthatlovesyouback";
            }
          ?>
          <a href="<?php echo $facebookLink;?>"><img src="img/home/facebook-brown.png" alt="Facebook"></a>
          <a href="<?php echo $twitterLink;?>"><img src="img/home/twitter-brown.png" alt="Twitter"></a>
          <a href="https://www.instagram.com/burtsbeesde"><img src="img/home/instagram-brown.png" alt="Instagram"></a>
        </div>

      </div>
      <div id="right-8hour">
        <img src="img/home/8hr-modal-right-bee.png" id="bee-photos" alt="Bee">
        <div id="form-container">

          <form id="lipstick-giveaway-form" method="post">
            <label for="fname"><?php echo $translations[6];?></label>
            <input type="text" name="fname" id="fname">
            <label for="lname"><?php echo $translations[7];?></label>
            <input type="text" name="lname" id="lname">
            <label for="em"><?php echo $translations[8];?></label>
            <input type="text" name="em" id="em">
            <label for="postcode"><?php echo $translations[9];?></label>
            <input type="text" name="postcode" id="postcode">
            <label for="address" id="address-label"><?php echo $translations[10];?></label>
            <span><?php echo $translations[11];?></span>
            <input type="text" name="address" id="address">
            <input type="checkbox" name="newsletter" id="newsletter"><label for="newsletter"><?php echo $translations[12];?></label>
            <input type="hidden" value="<?php echo $slotID;?>" id="slot-id" name="slot-id">
            <input type="hidden" value="<?php echo $countryID;?>" id="ctry-id" name="ctry-id">
            <div id="form-errors"><p></p></div>
            <img src="img/layout/ajax-loader.gif" alt="Loading Spinner" id="loading-spinner">
            <button type="submit" id="giveaway-submit"><?php echo $translations[13];?></button>
            <p id="terms-link"><?php echo $translations[14];?></a></p>
          </form>

          <div id="giveaway-thanks">
            <img src="img/home/<?php echo imageDirectory($country);?>8hr-modal-thanks-b.png" alt="Thank you and good luck" id="hex-8hour-thanks-nolink">
            <!--
            <img src="img/home/8hr-modal-thanks.png" alt="Thank you and good luck">
            <a href="lip-shade-finder.php"><button id="lip-shade-link">Click Here</button></a>
            -->
          </div> 
        </div>
      </div>
    </div>
  </div>
    
</div>
<?php
}
?>



<!-- Selfie Gallery -->

<?php 
if($country!=="aus"){
?>
<div class="section background-boards" id="section-selfie">
  <div class="content">
    <div class="sixty" id="">
      <a href="selfie-gallery.php"><img src="img/home/<?php echo imageDirectory($country);?>share-your-best-selfie.png" id="" alt="Share your best selfie"></a>
    </div>
    <div class="forty">

      <div id="homepage-selfie-juicer">
        <script src="//assets.juicer.io/embed.js" type="text/javascript"></script>
        <link href="//assets.juicer.io/embed.css" media="all" rel="stylesheet" type="text/css" />

        <?php
        //Different selfie feeds for different countries.
        if($country=="de"){
          $feed = "lipstickthatlovesyouback-2031825f-9882-4f99-9a1e-60f72df3c516";
        }
        if($country=="uk" || $country=="aus" ){
          $feed = "readyagency";
        }
        ?>
        <ul class="juicer-feed" data-feed-id="<?php echo $feed;?>"></ul>

      </div>

    </div>
  </div>
  </div>
</div>
<?php 
}
?>


<!-- Lip shade finder -->

<div class="section background-white background-lipstick" id="shade-finder">
  <div class="content  flex center-align" >
    <a href="lip-shade-finder.php"><img src="img/home/<?php echo imageDirectory($country);?>lip-shade-finder-cta.png" alt="Find your shade" id="lip-shade-finder"></a>
  </div>
</div>




<!-- Read the Lips -->

<!--
<div class="section background-texture" id="section-read-the-lips">
  <div class="content background-lips">
    <div class="sixty">
      <a href="read-the-lips.php"><img src="img/home/hexagon-kiss.png" id="hexagon-youtube" alt="Womans lips"  style="transform: translateY(40px);" data-1600="transform: translateY(40px);" data-1800="transform: translateY(0px);"></a>
    </div>
    <div class="forty">
      <img src="img/home/play-read-the-lips.png" id="" alt="Play and Win">
      <p>Watch our silent clue videos and guess the lipstick shade name.</p>
      <a href="read-the-lips.php"><button>Play Now</button></a>
    </div>
  </div>
  </div>
</div>
-->

<!-- Personalised ecard -->
<?php
  if($country === "uk" || $country === "aus" ){
?>
<div class="section background-boards" id="">
  <div class="content">
      <a href="cards.php"><img src="img/home/<?php echo imageDirectory($country);?>send-your-friend.png" id="send-your-friend-cta" alt="Send your friend a personalised gift card"></a>
  </div>
  </div>
</div>
<?php
}
?>




<?php
include('includes/footer.php');