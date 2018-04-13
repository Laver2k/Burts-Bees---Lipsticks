<?php include('includes/header.php'); ?>

<!-- 'Back to home' bar -->
<div class="section background-short-clouds" id="home-bar">
  <div class="content" >
    <div id="home-bar-left">
      <div>
        <a href="index.php"><img src="img/lipstick-range/<?php echo imageDirectory($country);?>icon-back.png" alt="Back to home"></a>
      </div>

    </div>
    <div id="home-bar-middle">
      <img src="img/lipstick-range/banner-loves-you-back.png" alt="Loves you back">
    </div>
    <div id="home-bar-right"></div>
  </div>
</div>

<!-- Share your best pout -->
<div class="section background-light-pink" id="section-selfie-description">
  <div class="content">
  	<div id="selfie-gallery-intro" class="selfie-gallery-half">
  		<img src="img/selfie/<?php echo imageDirectory($country);?>text-share-pout.png" alt="Share your best pout" id="text-share-pout">
  		<p><?php echo $translations[21]?></p>
	  	<div id="selfie-social">
	  		<?php 
	  		if ($country=="uk") {
	  			$instaLink = "https://www.instagram.com/burtsbeesuk/";
	  			$twLink = "http://twitter.com/#!/BurtsBeesUK";
	  		}
	  		if ($country=="de") {
	  			$instaLink = "https://www.instagram.com/burtsbeesde/";
	  			$twLink = "http://twitter.com/#!/BurtsBeesUK";
	  		}
	  		if ($country=="aus") {
	  			$instaLink = "https://www.instagram.com/burtsbeesaus/";
	  			$twLink = "https://twitter.com/#!/BurtsBeesAus";
	  		}
	  		?>
	  		<a href="<?php echo $instaLink;?>"><img src="img/home/instagram-brown.png" alt="Instagram"></a>
	  		<a href="<?php echo $twLink;?>"><img src="img/home/twitter-brown.png" alt="Twitter"></a>
	  	</div>
  	</div>

  	<div id="selfie-gallery-intro-images" class="selfie-gallery-half background-boards">
  		<img src="img/selfie/hex=and-lipstick.png" alt="Pouting girl">
  	</div>
  </div>
</div>

<div id="selfie-gallery-juicer">
	<script src="//assets.juicer.io/embed.js" type="text/javascript"></script>
	<link href="//assets.juicer.io/embed.css" media="all" rel="stylesheet" type="text/css" />
	<?php
	//Different selfie feeds for different countries.
	if($country=="de"){
		$feed = "lipstickthatlovesyouback-021eccad-b884-41f2-b836-c7060c025820";
	}
	if($country=="uk" || $country=="aus" ){
		$feed = "lipstickthatlovesyouback";
	}
	?>
	<ul class="juicer-feed" data-feed-id="<?php echo $feed;?>"></ul>
</div>


<?php
include('includes/footer.php');