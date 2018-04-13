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


<!-- 18 shades of full coverage bliss -->
<div class="section background-grey" id="eighteen-shades">
  <div class="content center-align" >
    <div class="coverage-block" id="">
      <img src="img/lipstick-range/<?php echo imageDirectory($country);?>full-coverage.jpg" alt="lipsticks - heart shaped">
      <?php
      if($country=="uk") {
        $shopLink = "https://www.burtsbees.co.uk/natural-products/lips-lip-colour/lipstick.html";
      }
      if($country=="aus") {
        $shopLink = "http://burtsbees.com.au/natural-products/lips-lip-colour/lipstick.html";
      }
      if($country=="de") {
        $shopLink = "http://burtsbees.de/kategorie/lippen-farbe/lippenstift.html";
      }
      ?>
      <a href="<?php echo $shopLink;?>"><button id="range-buy-now"><?php echo $translations[15];?></button></a>
    </div>
    <div class="coverage-block" id="">
      <img src="img/lipstick-range/full-coverage-lady.jpg" alt="smiling lady">
    </div>
  </div>
</div>



<!-- Lipstick slides -->
<div class="section background-white-then-grey">
  <div class="content center-align background-white" id="shade-browser">


    <div class="twenty-five shade-button shade-pinks" data-colour="pinks">
      <img src="img/lipstick-range/<?php echo imageDirectory($country);?>text-pinks.png" alt="Pinks" class="ga" data-clicked="Slider - Pinks Tab">
    </div>
    <div class="twenty-five shade-button shade-nudes" data-colour="nudes">
      <img src="img/lipstick-range/<?php echo imageDirectory($country);?>text-nudes.png" alt="Nudes" class="ga" data-clicked="Slider - Nudes Tab">
    </div>
    <div class="twenty-five shade-button shade-reds" data-colour="reds">
      <img src="img/lipstick-range/<?php echo imageDirectory($country);?>text-reds.png" alt="Reds" class="ga" data-clicked="Slider - Reds Tab">
    </div>
    <div class="twenty-five shade-button shade-plums" data-colour="plums">
      <img src="img/lipstick-range/<?php echo imageDirectory($country);?>text-plums.png" alt="Plums" class="ga" data-clicked="Slider - Plums Tab">
    </div>


    <div class="twenty-five">
      <div class="arrow-down arrow-pinks shade-category-current"></div>
    </div>
    <div class="twenty-five">
      <div class="arrow-down arrow-nudes"></div>
    </div>
    <div class="twenty-five">
      <div class="arrow-down arrow-reds"></div>
    </div>
    <div class="twenty-five">
      <div class="arrow-down arrow-plums"></div>
    </div>

    <div id="shade-browser-shades">
      <div id="smile">

        <img src="img/lipstick-range/lips-iced-iris.png" alt="Iced Iris Lips" class="lips-iced-iris active">
        <a data-buybutton="iced-iris" href="<?php echo $buyShadeLinks[0];?>"><button class="lips-iced-iris active"><?php echo $translations[15];?></button></a>

        <img src="img/lipstick-range/lips-doused-rose.png" alt="Doused Rose Lips" class="lips-doused-rose">
        <a data-buybutton="doused-rose" href="<?php echo $buyShadeLinks[1];?>"><button class="lips-doused-rose"><?php echo $translations[15];?></button></a>

        <img src="img/lipstick-range/lips-fuchsia-flood.png" alt="Fuchsia Flood Lips" class="lips-fuchsia-flood">
        <a data-buybutton="fuchsia-flood" href="<?php echo $buyShadeLinks[2];?>"><button class="lips-fuchsia-flood"><?php echo $translations[15];?></button></a>

        <img src="img/lipstick-range/lips-magenta-rush.png" alt="Magenta Rush Lips" class="lips-magenta-rush">
        <a data-buybutton="magenta-rush" href="<?php echo $buyShadeLinks[3];?>"><button class="lips-magenta-rush"><?php echo $translations[15];?></button></a>

        <img src="img/lipstick-range/lips-sunset-cruise.png" alt="Sunset Cruise Lips" class="lips-sunset-cruise">
        <a data-buybutton="sunset-cruise" href="<?php echo $buyShadeLinks[4];?>"><button class="lips-sunset-cruise"><?php echo $translations[15];?></button></a>

        <img src="img/lipstick-range/lips-nile-nude.png" alt="Nile Nude Lips" class="lips-nile-nude">
        <a data-buybutton="nile-nude" href="<?php echo $buyShadeLinks[5];?>"><button class="lips-nile-nude"><?php echo $translations[15];?></button></a>

        <img src="img/lipstick-range/lips-blush-basin.png" alt="Blush Basin Lips" class="lips-blush-basin">
        <a data-buybutton="blush-basin" href="<?php echo $buyShadeLinks[6];?>"><button class="lips-blush-basin"><?php echo $translations[15];?></button></a>

        <img src="img/lipstick-range/lips-suede-splash.png" alt="Suede Splash Lips" class="lips-suede-splash">
        <a data-buybutton="suede-splash" href="<?php echo $buyShadeLinks[7];?>"><button class="lips-suede-splash"><?php echo $translations[15];?></button></a>

        <img src="img/lipstick-range/lips-scarlet-soaked.png" alt="Scarlet Soaked Lips" class="lips-scarlet-soaked">
        <a data-buybutton="scarlet-soaked" href="<?php echo $buyShadeLinks[8];?>"><button class="lips-scarlet-soaked"><?php echo $translations[15];?></button></a>

        <img src="img/lipstick-range/lips-crimson-coast.png" alt="Crimson Coast Lips" class="lips-crimson-coast">
        <a data-buybutton="crimson-coast" href="<?php echo $buyShadeLinks[9];?>"><button class="lips-crimson-coast"><?php echo $translations[15];?></button></a>

        <img src="img/lipstick-range/lips-ruby-ripple.png" alt="Ruby Ripple Lips" class="lips-ruby-ripple">
        <a data-buybutton="ruby-ripple" href="<?php echo $buyShadeLinks[10];?>"><button class="lips-ruby-ripple"><?php echo $translations[15];?></button></a>

        <img src="img/lipstick-range/lips-russet-river.png" alt="Russet River Lips" class="lips-russet-river">
        <a data-buybutton="russet-river" href="<?php echo $buyShadeLinks[11];?>"><button class="lips-russet-river"><?php echo $translations[15];?></button></a>

        <img src="img/lipstick-range/lips-tulip-tide.png" alt="Tulip Tide Lips" class="lips-tulip-tide">
        <a data-buybutton="tulip-tide" href="<?php echo $buyShadeLinks[12];?>"><button class="lips-tulip-tide"><?php echo $translations[15];?></button></a>

        <img src="img/lipstick-range/lips-wine-wave.png" alt="Wine Wave Lips" class="lips-wine-wave">
        <a data-buybutton="wine-wave" href="<?php echo $buyShadeLinks[13];?>"><button class="lips-wine-wave"><?php echo $translations[15];?></button></a>

        <img src="img/lipstick-range/lips-lily-lake.png" alt="Lily Lake Lips" class="lips-lily-lake">
        <a data-buybutton="lily-lake" href="<?php echo $buyShadeLinks[14];?>"><button class="lips-lily-lake"><?php echo $translations[15];?></button></a>

        <img src="img/lipstick-range/lips-brimming-berry.png" alt="Brimming Berry Lips" class="lips-brimming-berry">
        <a data-buybutton="brimming-berry" href="<?php echo $buyShadeLinks[15];?>"><button class="lips-brimming-berry"><?php echo $translations[15];?></button></a>

        <img src="img/lipstick-range/lips-juniper-water.png" alt="Juniper Water Lips" class="lips-juniper-water">
        <a data-buybutton="juniper-water" href="<?php echo $buyShadeLinks[16];?>"><button class="lips-juniper-water"><?php echo $translations[15];?></button></a>

        <img src="img/lipstick-range/lips-orchid-ocean.png" alt="Orchid Ocean Lips" class="lips-orchid-ocean">
        <a data-buybutton="orchid-ocean" href="<?php echo $buyShadeLinks[17];?>"><button class="lips-orchid-ocean"><?php echo $translations[15];?></button></a>


      </div>


      <div id="smudges">


        <div id="smudges-pinks" class="smudge-set show">
          <div class="smudge active ga" data-shade="iced-iris" data-clicked="Lip shade - Iced iris">
            <img src="img/lipstick-range/smudge-iced-iris.png" alt="Smudge - iced iris">
            <br>
            <a href="#">Iced<br/>Iris</a>
          </div>
          <div class="smudge ga" data-shade="doused-rose" data-clicked="Lip shade - Doused Rose">
            <img src="img/lipstick-range/smudge-doused-rose.png" alt="Smudge - doused rose">
            <br>
            <a href="#">Doused<br/>Rose</a>
          </div>
          <div class="smudge ga" data-shade="fuchsia-flood" data-clicked="Lip shade - Fuchsia Flood">
            <img src="img/lipstick-range/smudge-fuchsia-flood.png" alt="Smudge - fuchsia flood">
            <br>
            <a href="#">Fuchsia<br/>Flood</a>
          </div>
          <div class="smudge ga" data-shade="magenta-rush" data-clicked="Lip shade - Magenta Rush">
            <img src="img/lipstick-range/smudge-magenta-rush.png" alt="Smudge - magenta rush">
            <br>
            <a href="#">Magenta<br/>Rush</a>
          </div>
          <div class="smudge ga" data-shade="sunset-cruise" data-clicked="Lip shade - Sunset Cruise">
            <img src="img/lipstick-range/smudge-sunset-cruise.png" alt="Smudge - sunset cruise">
            <br>
            <a href="#">Sunset<br/>Cruise</a>
          </div>
        </div>


        <div id="smudges-nudes" class="smudge-set">
          <div class="smudge ga" data-shade="nile-nude" data-clicked="Lip shade - Nile Nude">
            <img src="img/lipstick-range/smudge-nile-nude.png" alt="Smudge - nile nude">
            <br>
            <a href="#">Nile<br/>Nude</a>
          </div>
          <div class="smudge ga" data-shade="blush-basin" data-clicked="Lip shade - Blush Basin">
            <img src="img/lipstick-range/smudge-blush-basin.png" alt="Smudge - blush basin">
            <br>
            <a href="#">Blush<br/>Basin</a>
          </div>
          <div class="smudge ga" data-shade="suede-splash" data-clicked="Lip shade - Suede Splash">
            <img src="img/lipstick-range/smudge-suede-splash.png" alt="Smudge - suede splash">
            <br>
            <a href="#">Suede<br/>Splash</a>
          </div>

        </div>

        <div id="smudges-reds" class="smudge-set">
          <div class="smudge ga" data-shade="scarlet-soaked" data-clicked="Lip shade - Scarlet Soaked">
            <img src="img/lipstick-range/smudge-scarlet-soaked.png" alt="Smudge - scarlet soaked">
            <br>
            <a href="#">Scarlet<br/>Soaked</a>
          </div>
          <div class="smudge ga" data-shade="crimson-coast" data-clicked="Lip shade - Crimson Coast">
            <img src="img/lipstick-range/smudge-crimson-coast.png" alt="Smudge - crimson coast">
            <br>
            <a href="#">Crimson<br/>Coast</a>
          </div>
          <div class="smudge ga" data-shade="ruby-ripple" data-clicked="Lip shade - Ruby Ripple">
            <img src="img/lipstick-range/smudge-ruby-ripple.png" alt="Smudge - ruby ripple">
            <br>
            <a href="#">Ruby<br/>Ripple</a>
          </div>
          <div class="smudge ga" data-shade="russet-river" data-clicked="Lip shade - Russet River">
            <img src="img/lipstick-range/smudge-russet-river.png" alt="Smudge - russet river">
            <br>
            <a href="#">Russet<br/>River</a>
          </div>
  
        </div>



        <div id="smudges-plums" class="smudge-set">
          <div class="smudge ga" data-shade="tulip-tide" data-clicked="Lip shade - Tulip Tide">
            <img src="img/lipstick-range/smudge-tulip-tide.png" alt="Smudge - tulip tide">
            <br>
            <a href="#">Tulip<br/>Tide</a>
          </div>
          <div class="smudge ga" data-shade="wine-wave" data-clicked="Lip shade - Wine Wave">
            <img src="img/lipstick-range/smudge-wine-wave.png" alt="Smudge - wine wave">
            <br>
            <a href="#">Wine<br/>Wave</a>
          </div>
          <div class="smudge ga" data-shade="lily-lake" data-clicked="Lip shade - Lily Lake">
            <img src="img/lipstick-range/smudge-lily-lake.png" alt="Smudge - lily lake">
            <br>
            <a href="#">Lily<br/>Lake</a>
          </div>
          <div class="smudge ga"data-shade="brimming-berry" data-clicked="Lip shade - Brimming Berry">
            <img src="img/lipstick-range/smudge-brimming-berry.png" alt="Smudge - brimming berry">
            <br>
            <a href="#">Brimming<br/>Berry</a>
          </div>
          <div class="smudge ga" data-shade="juniper-water" data-clicked="Lip shade - Juniper Water">
            <img src="img/lipstick-range/smudge-juniper-water.png" alt="Smudge - juniper water">
            <br>
            <a href="#">Juniper<br/>Water</a>
          </div>
          <div class="smudge ga" data-shade="orchid-ocean" data-clicked="Lip shade - Orchid Ocean">
            <img src="img/lipstick-range/smudge-orchid-ocean.png" alt="Smudge - orchid ocean">
            <br>
            <a href="#">Orchid<br/>Ocean</a>
          </div>
        </div>

      </div>
      
    </div>

  </div>
</div>


<!-- Lip shade finder -->
<!--
<div class="section background-white background-lipstick" id="shade-finder">
  <div class="content flex center-align" >
    <a href="lip-shade-finder.php"><img src="img/home/lip-shade-finder-cta.png" alt="Find your shade" id="lip-shade-finder"></a>
  </div>
</div>
-->


<!-- 100% natural ingredients -->
<div class="section background-pink background-lipstick-line" id="ingredients">
  <div class="content center-align">

    <img src="img/lipstick-range/<?php echo imageDirectory($country);?>100-percent-natural.png" id="hundred-percent-banner"> 

    <p id ="ingredients-intro"><?php echo $translations[16];?></p>

    <img src="img/lipstick-range/<?php echo imageDirectory($country);?>text-ingredients.png" id="text-ingredients"> 
    <div id="ingredients-wrapper">
      <div class="half left-ingredient">
        <div class="ingredient-hex">
          <img src="img/lipstick-range/hex-moringa.png" alt="Moringa">
        </div>
        <div class="ingredient-description moringa-description">
          <img src="img/lipstick-range/<?php echo imageDirectory($country);?>text-moringa.png" id="text-moringa" alt="Moringa Oil">
          <p><?php echo $translations[17];?></p>
        </div>
      </div>
      <div class="half right-ingredient">
        <div class="ingredient-hex">
          <img src="img/lipstick-range/hex-raspberry.png" id="raspberry" alt="Raspberry">
        </div>
        <div class="ingredient-description raspberry-description">
          <img src="img/lipstick-range/<?php echo imageDirectory($country);?>text-raspberry.png" id="text-raspberry" alt="Raspberry Seed Oil">
          <p><?php echo $translations[18];?></p>
        </div>
      </div>
    </div>

  </div>
</div>


<!-- info boxes -->
<div class="section background-white" id="">
  <div class="content" >
    <div class="info-box">
      <img src="img/lipstick-range/box-lipstick-pebbles.png" alt="lipstick in pebbley river">
      <p><?php echo $translations[19];?></p>
    </div>
    <div class="info-box">
      <img src="img/lipstick-range/box-recyclable.png" alt="lipstick and recycling sign">
      <p><?php echo $translations[20];?></p>
    </div>
  </div>
</div>




<?php
include('includes/footer.php');