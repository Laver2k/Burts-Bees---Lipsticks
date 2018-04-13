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


<!-- Find your perfect shade -->
<div class="section background-white" id="find-your-shade">
  <div class="content">
  	<div class="half" id="shadefinder-intro">
  		<img src="img/lipstick-matrix/<?php echo imageDirectory($country);?>text-intro.png" alt="Find your perfect shades">
		<p id="consult-the-origin"><?php echo $translations[32];?></p>
		<p><?php echo $translations[33];?></p>
		<p><?php echo $translations[34];?></p>
  	</div>
  	<div class="half">
  		<img src="img/lipstick-matrix/hex-girl.jpg" alt="Smiling girl">
  	</div>
  </div>
</div>


<!-- Lipstick Matrix -->
<div class="section background-flowers-large background-pink" id="matrix-section">





	<div class="content">

		<div id="quiz-section">
	  		<div class="matrix-row">
	  			<div class="question">
	  				<img src="img/lipstick-matrix/<?php echo imageDirectory($country);?>text-skin.png" id="question-skin-shade" alt="What is your skin shade">
	  			</div>

	  			<div class="answers">
		  			<div class="answer active" data-question="1" data-answer="1">
	  					<img src="img/lipstick-matrix/<?php echo imageDirectory($country);?>hex-1-1.png" alt="shade 1" class="not-highlighted">
	  					<img src="img/lipstick-matrix/<?php echo imageDirectory($country);?>hex-1-1-active.png" alt="shade 1" class="highlighted">
		  			</div>
		  			<div class="answer inactive" data-question="1" data-answer="2">
		  				<img src="img/lipstick-matrix/<?php echo imageDirectory($country);?>hex-1-2.png" alt="shade 2" class="not-highlighted">
		  				<img src="img/lipstick-matrix/<?php echo imageDirectory($country);?>hex-1-2-active.png" alt="shade 2" class="highlighted">
		  			</div>
		  			<div class="answer inactive" data-question="1" data-answer="3">
	  					<img src="img/lipstick-matrix/<?php echo imageDirectory($country);?>hex-1-3.png" alt="shade 3" class="not-highlighted">
	  					<img src="img/lipstick-matrix/<?php echo imageDirectory($country);?>hex-1-3-active.png" alt="shade 3" class="highlighted">
		  			</div>
		  			<div class="answer inactive" data-question="1" data-answer="4">
	  					<img src="img/lipstick-matrix/<?php echo imageDirectory($country);?>hex-1-4.png" alt="shade 4" class="not-highlighted">
	  					<img src="img/lipstick-matrix/<?php echo imageDirectory($country);?>hex-1-4-active.png" alt="shade 4" class="highlighted">
		  			</div>
		  			<div class="answer inactive" data-question="1" data-answer="5"> 
	  					<img src="img/lipstick-matrix/<?php echo imageDirectory($country);?>hex-1-5.png" alt="shade 5" class="not-highlighted">
	  					<img src="img/lipstick-matrix/<?php echo imageDirectory($country);?>hex-1-5-active.png" alt="shade 5" class="highlighted">
		  			</div>
		  		</div>
	  		</div>


	  		<div class="matrix-row">
	  			<div class="question">
	  				<img src="img/lipstick-matrix/<?php echo imageDirectory($country);?>text-occasion.png" id="question-occasion" alt="What is the occasion">
	  			</div>
	  			<div class="answers">
		  			<div class="answer active" data-question="2" data-answer="1">
	  					<img src="img/lipstick-matrix/<?php echo imageDirectory($country);?>hex-2-1.png" alt="casual" class="not-highlighted">
	  					<img src="img/lipstick-matrix/<?php echo imageDirectory($country);?>hex-2-1-active.png" alt="casual" class="highlighted">
		  			</div>
		  			<div class="answer inactive" data-question="2" data-answer="2">
		  				<img src="img/lipstick-matrix/<?php echo imageDirectory($country);?>hex-2-2.png" alt="every day" class="not-highlighted">
		  				<img src="img/lipstick-matrix/<?php echo imageDirectory($country);?>hex-2-2-active.png" alt="every day" class="highlighted">
		  			</div>
		  			<div class="answer inactive" data-question="2" data-answer="3">
	  					<img src="img/lipstick-matrix/<?php echo imageDirectory($country);?>hex-2-3.png" alt="professional" class="not-highlighted">
	  					<img src="img/lipstick-matrix/<?php echo imageDirectory($country);?>hex-2-3-active.png" alt="professional" class="highlighted">
		  			</div>
		  			<div class="answer inactive" data-question="2" data-answer="4">
	  					<img src="img/lipstick-matrix/<?php echo imageDirectory($country);?>hex-2-4.png" alt="going out" class="not-highlighted">
	  					<img src="img/lipstick-matrix/<?php echo imageDirectory($country);?>hex-2-4-active.png" alt="going out" class="highlighted">
		  			</div>
		  		</div>
	  		</div>

	  		<div class="matrix-row">
	  			<div class="question">
	  				<img src="img/lipstick-matrix/<?php echo imageDirectory($country);?>text-mood.png" id="question-mood" alt="What is your current mood">
	  			</div>
	  			<div class="answers">
		  			<div class="answer active" data-question="3" data-answer="1">
	  					<img src="img/lipstick-matrix/<?php echo imageDirectory($country);?>hex-3-1.png" alt="Happy Bee" class="not-highlighted">
	  					<img src="img/lipstick-matrix/<?php echo imageDirectory($country);?>hex-3-1-active.png" alt="Happy Bee" class="highlighted">
		  			</div>
		  			<div class="answer inactive" data-question="3" data-answer="2">
		  				<img src="img/lipstick-matrix/<?php echo imageDirectory($country);?>hex-3-2.png" alt="Playful Me" class="not-highlighted">
		  				<img src="img/lipstick-matrix/<?php echo imageDirectory($country);?>hex-3-2-active.png" alt="Playful Me" class="highlighted">
		  			</div>
		  			<div class="answer inactive" data-question="3" data-answer="3">
	  					<img src="img/lipstick-matrix/<?php echo imageDirectory($country);?>hex-3-3.png" alt="Cheer me up" class="not-highlighted">
	  					<img src="img/lipstick-matrix/<?php echo imageDirectory($country);?>hex-3-3-active.png" alt="Cheer me up" class="highlighted">
		  			</div>
		  		</div>
	  		</div>

	  		<input type="hidden" name="question1-answer" id="question1-answer" value="1">
	  		<input type="hidden" name="question2-answer" id="question2-answer" value="1">
	  		<input type="hidden" name="question3-answer" id="question3-answer" value="1">
	  		<button id="see-results"><?php echo $translations[35];?></button>
  		</div>

  		<div id="answers-section">
  			<img src="img/lipstick-matrix/<?php echo imageDirectory($country);?>text-your-perfect-shades.png" alt="Your perfect shades" id="your-perfect-shades">
  			<p id="answers-summary"><?php echo $translations[36];?></p>
  			<div id="lipstick-selection">

  				<div class="lipstick-result 1-1-1 1-1-3 1-2-1 1-2-3 1-3-1 1-3-3 2-1-1 2-1-3 2-2-1 2-3-1 2-3-3">
  					<img src="img/lipstick-matrix/iced-iris.png" >
  					<span class="cosmetic-type"><?php echo $translations[38];?></span>
  					<span>Iced Iris</span>
  					<a data-buybutton="iced-iris"  href="<?php echo $buyShadeLinks[0];?>"><button id="buy-now"><?php echo $translations[15];?></button></a>
  				</div>

          <?php 
          //non aus only
          if ($country != "aus") {
          ?>

  				<div class="lipstick-result 1-1-3 1-2-2 1-2-3 1-3-1 1-3-2 1-3-3 2-1-3 2-3-2 2-3-3 3-3-1 3-3-2">
  					<img src="img/lipstick-matrix/doused-rose.png" >
  					<span class="cosmetic-type"><?php echo $translations[38];?></span>
  					<span>Doused Rose</span>
  					<a data-buybutton="doused-rose" href="<?php echo $buyShadeLinks[1];?>"><button id="buy-now"><?php echo $translations[15];?></button></a>
  				</div>
          <?php
          } //non aus only
          ?>

  				<div class="lipstick-result 1-1-1 1-1-2 1-2-1 1-2-2 1-2-3 1-4-1 1-4-3 2-1-1 2-1-2 2-2-1 2-2-2 2-2-3 2-4-1 2-4-3 3-1-1 3-1-2 3-1-3 3-2-1 3-2-2 3-2-3 3-4-1 3-4-3 4-1-1 4-1-3 4-2-1 4-2-2 4-2-3 4-3-1 4-3-2 4-3-3 4-4-1 5-1-1 5-1-3 5-2-1 5-2-3 5-3-1 5-3-2 5-3-3">
  					<img src="img/lipstick-matrix/fuchsia-flood.png" >
  					<span class="cosmetic-type"><?php echo $translations[38];?></span>
  					<span>Fuchsia FLood</span>
  					<a data-buybutton="fuchsia-flood" href="<?php echo $buyShadeLinks[2];?>"><button id="buy-now"><?php echo $translations[15];?></button></a>
  				</div>
  				<div class="lipstick-result 1-4-1 1-4-2 1-4-3 2-2-1 2-2-2 2-2-3 2-4-1 2-4-2 2-4-3 3-1-1 3-1-2 3-1-3 3-2-2 3-2-3 3-4-1 3-4-3 4-1-1 4-1-2 4-1-3 4-2-1 4-2-2 4-2-3 4-3-1 4-3-2 4-3-3 4-4-1 4-4-3 5-1-1 5-1-2 5-1-3 5-2-1 5-2-2 5-2-3 5-3-1 5-3-2 5-3-3">
  					<img src="img/lipstick-matrix/magenta-rush.png" >
  					<span class="cosmetic-type"><?php echo $translations[38];?></span>
  					<span>Magenta Rush</span>
  					<a data-buybutton="magenta-rush" href="<?php echo $buyShadeLinks[3];?>"><button id="buy-now"><?php echo $translations[15];?></button></a>
  				</div>
  				<div class="lipstick-result 1-1-1 1-1-2 1-1-3 1-2-1 1-2-2 1-2-3 1-3-1 1-3-2 1-3-3 2-1-1 2-1-2 2-1-3 2-2-1 2-2-2 2-2-3 2-3-1 2-3-2 2-3-3 3-1-1 3-1-2 3-1-3 3-2-1 3-2-3 3-3-1 3-3-2 3-3-3 4-2-1 4-3-1">
  					<img src="img/lipstick-matrix/sunset-cruise.png" >
  					<span class="cosmetic-type"><?php echo $translations[38];?></span>
  					<span>Sunset Cruise</span>
  					<a data-buybutton="sunset-cruise" href="<?php echo $buyShadeLinks[4];?>"><button id="buy-now"><?php echo $translations[15];?></button></a>
  				</div>
  				<div class="lipstick-result">
  					<img src="img/lipstick-matrix/nile-nude.png" >
  					<span class="cosmetic-type"><?php echo $translations[38];?></span>
  					<span>Nile Nude</span>
  					<a data-buybutton="nile-nude" href="<?php echo $buyShadeLinks[5];?>"><button id="buy-now"><?php echo $translations[15];?></button></a>
  				</div>
  				<div class="lipstick-result 1-2-2 1-3-1 2-3-1 2-3-2 3-2-1 3-3-3">
  					<img src="img/lipstick-matrix/blush-basin.png" >
  					<span class="cosmetic-type"><?php echo $translations[38];?></span>
  					<span>Blush Basin</span>
  					<a data-buybutton="blush-basin" href="<?php echo $buyShadeLinks[6];?>"><button id="buy-now"><?php echo $translations[15];?></button></a>
  				</div>
  				<div class="lipstick-result 1-1-1 1-2-1 1-3-1 2-1-1 2-2-1 2-3-1 3-1-1 3-2-1 3-3-1 3-3-3 4-3-1">
  					<img src="img/lipstick-matrix/suede-splash.png" >
  					<span class="cosmetic-type"><?php echo $translations[38];?></span>
  					<span>Suede Splash</span>
  					<a data-buybutton="suede-splash" href="<?php echo $buyShadeLinks[7];?>"><button id="buy-now"><?php echo $translations[15];?></button></a>
  				</div>
  				<div class="lipstick-result 1-1-2 1-1-3 1-4-2 1-4-3 2-1-2 2-1-3 2-4-1 2-4-2 2-4-3 3-1-1 3-1-2 3-1-3 3-2-2 3-2-3 3-3-1 3-3-2 3-3-3 4-4-3 5-1-1 5-1-2 5-1-3 5-2-1 5-2-2 5-2-3 5-4-3">
  					<img src="img/lipstick-matrix/scarlet-soaked.png" >
  					<span class="cosmetic-type"><?php echo $translations[38];?></span>
  					<span>Scarlet Soaked</span>
  					<a data-buybutton="scarlet-soaked" href="<?php echo $buyShadeLinks[8];?>"><button id="buy-now"><?php echo $translations[15];?></button></a>
  				</div>
          <?php
          //non aus only
          if ($country != "aus") {
          ?>

  				<div class="lipstick-result 2-4-2 4-3-2 4-3-3 4-4-1 4-4-2 4-4-3 5-1-1 5-1-3 5-2-1 5-3-1 5-3-2 5-3-3 5-4-1 5-4-2 5-4-3">
  					<img src="img/lipstick-matrix/crimson-coast.png" >
  					<span class="cosmetic-type"><?php echo $translations[38];?></span>
  					<span>Crimson Coast</span>
  					<a data-buybutton="crimson-coast" href="<?php echo $buyShadeLinks[9];?>"><button id="buy-now"><?php echo $translations[15];?></button></a>
  				</div>
          <?php
          }//non aus only
          ?>
  				<div class="lipstick-result 1-1-1 1-4-1 1-4-2 1-4-3 2-1-1 2-1-2 2-1-3 2-4-1 2-4-2 2-4-3 3-1-1 3-1-2 3-1-3 3-2-2 3-2-3 3-3-2 3-3-3 3-4-1 3-4-2 3-4-3 4-1-1 4-1-2 4-1-3 4-2-1 4-2-2 4-2-3 4-3-2 4-3-3 4-4-1 4-4-2 4-4-3 5-1-1 5-1-2 5-1-3 5-2-1 5-2-2 5-2-3 5-3-2 5-3-3 5-4-1 5-4-2 5-4-3">
  					<img src="img/lipstick-matrix/ruby-ripple.png" >
  					<span class="cosmetic-type"><?php echo $translations[38];?></span>
  					<span>Ruby Ripple</span>
  					<a data-buybutton="ruby-ripple" href="<?php echo $buyShadeLinks[10];?>"><button id="buy-now"><?php echo $translations[15];?></button></a>
  				</div>
  				<div class="lipstick-result 4-4-2 5-4-2">
  					<img src="img/lipstick-matrix/russet-river.png" >
  					<span class="cosmetic-type"><?php echo $translations[38];?></span>
  					<span>Russet River</span>
  					<a data-buybutton="russet-river" href="<?php echo $buyShadeLinks[11];?>"><button id="buy-now"><?php echo $translations[15];?></button></a>
  				</div>
  				<div class="lipstick-result 1-1-1 1-1-2 1-1-3 1-2-1 1-2-2 1-2-3 1-2-1 1-2-2 1-2-3 1-3-1 1-3-2 1-3-3 2-1-1 2-1-2 2-1-3 2-2-1 2-2-2 2-2-3 2-3-2 2-3-3 3-2-1 3-3-1 3-3-2">
  					<img src="img/lipstick-matrix/tulip-tide.png" >
  					<span class="cosmetic-type"><?php echo $translations[38];?></span>
  					<span>Tulip Tide</span>
  					<a data-buybutton="tulip-tide" href="<?php echo $buyShadeLinks[12];?>"><button id="buy-now"><?php echo $translations[15];?></button></a>
  				</div>
          <?php
          //non aus only
          if ($country != "aus") {
          ?>

  				<div class="lipstick-result 1-4-1 2-4-3 3-4-2 3-4-3 4-1-1 4-1-3 4-3-1 4-3-2 4-3-3 4-4-1 4-4-2 4-4-3 5-2-1 5-2-2 5-2-3 5-3-1 5-3-2 5-3-3 5-4-1 5-4-2 5-4-3">
  					<img src="img/lipstick-matrix/wine-wave.png" >
  					<span class="cosmetic-type"><?php echo $translations[38];?></span>
  					<span>Wine Wave</span>
  					<a data-buybutton="wine-wave" href="<?php echo $buyShadeLinks[13];?>"><button id="buy-now"><?php echo $translations[15];?></button></a>
  				</div>
          <?php
          }//non aus only
          ?>
  				<div class="lipstick-result 1-1-3 1-3-1 1-3-2 1-3-3 1-4-1 1-4-2 2-1-3 2-2-2 2-2-3 2-3-1 2-3-2 2-3-3 2-4-1 3-1-1 3-1-2 3-1-3 3-2-1 3-2-2 3-2-3 3-3-1 3-3-2 3-3-3 3-4-1 4-1-1 4-1-2 4-1-3 4-2-1 4-2-2 4-2-3 4-3-1 5-1-1 5-2-1 5-3-1">
  					<img src="img/lipstick-matrix/lily-lake.png" >
  					<span class="cosmetic-type"><?php echo $translations[38];?></span>
  					<span>Lily Lake</span>
  					<a data-buybutton="lily-lake" href="<?php echo $buyShadeLinks[14];?>"><button id="buy-now"><?php echo $translations[15];?></button></a>
  				</div>
  				<div class="lipstick-result 1-4-2 1-4-3 2-4-1 2-4-2 2-4-3 3-4-1 3-4-2 3-4-3 4-3-2 4-3-3 4-4-1 4-4-2 4-4-3 5-1-1 5-1-2 5-1-3 5-2-2 5-2-3 5-3-1 5-3-2 5-3-3 5-4-1 5-4-2 5-4-3">
  					<img src="img/lipstick-matrix/brimming-berry.png" >
  					<span class="cosmetic-type"><?php echo $translations[38];?></span>
  					<span>Brimming Berry</span>
  					<a data-buybutton="brimming-berry" href="<?php echo $buyShadeLinks[15];?>"><button id="buy-now"><?php echo $translations[15];?></button></a>
  				</div>
  				<div class="lipstick-result 2-4-2 3-4-2 4-1-1 4-1-2 4-4-1 4-4-2 4-4-3 5-1-2 5-1-3 5-2-2 5-4-1 5-4-2 5-4-3">
  					<img src="img/lipstick-matrix/juniper-water.png" >
  					<span class="cosmetic-type"><?php echo $translations[38];?></span>
  					<span>Juniper Water</span>
  					<a data-buybutton="juniper-water" href="<?php echo $buyShadeLinks[16];?>"><button id="buy-now"><?php echo $translations[15];?></button></a>
  				</div>
          <?php
          //non aus only
          if ($country != "aus") {
          ?>
  				<div class="lipstick-result 4-4-2 5-4-2 5-4-3">
  					<img src="img/lipstick-matrix/orchid-ocean.png" >
  					<span class="cosmetic-type"><?php echo $translations[38];?></span>
  					<span>Orchid Ocean</span>
  					<a data-buybutton="orchid-ocean" href="<?php echo $buyShadeLinks[17];?>"><button id="buy-now"><?php echo $translations[15];?></button></a>
  				</div>
          <?php
          }//non aus only
          ?>
  			</div>
	  		<button id="retake-quiz"><?php echo $translations[39];?></button>
  		</div>

	</div>



</div>


<?php
include('includes/footer.php');