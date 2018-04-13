<?php include('includes/header.php'); ?>

<!-- 'Back to home' bar -->
<div class="section background-short-clouds" id="home-bar">
  <div class="content" >
    <div id="home-bar-left">
      <div>
        <a href="index.php"><img src="img/lipstick-range/icon-back.png" alt="Back to home"></a>
      </div>

    </div>
    <div id="home-bar-middle">
      <img src="img/lipstick-range/banner-loves-you-back.png" alt="Loves you back">
    </div>
    <div id="home-bar-right"></div>
  </div>
</div>


<!-- Send a personalised gift card -->
<div class="section background-wood" id="send-a-card">
  <div class="content center-align" >

    <button id="go-back" class="step-2">Go back</button>


    <div id="step">


      <div class="step-1">
        <img src="img/cards/personalised.png" alt="Send your friend a personalised gift card" id="personalised-title">
        <p id="step1-intro"><?php echo $translations[40];?></p>
        <img src="img/cards/spread-the-love.png" id="spread-the-love" alt="Spread the love">
        <div id="divider"></div>
        <img src="img/cards/step-1.png" alt="Step 1 - pick a card design" id="step1-hexagon">
      </div>

      <div class="step-2">
        <div id="divider"></div>
        <img src="img/cards/step-2.png" alt="Step 2 - personalise your card" id="step2-hexagon">
      </div>

      <div class="step-3">
        <div id="divider"></div>
        <img src="img/cards/step-3.png" alt="Step 3 - share your card" id="step2-hexagon">
      </div>


      <div class="step-4">
        <img src="img/cards/personalised.png" alt="Send your friend a personalised gift card" id="personalised-title">
        <br/>
        <img src="img/cards/thank-you.png" id="card-thanks" alt="Thank you">
        <p>You sure are going to make someone really happy!</p>
        <a href="cards.php"><button>Send another card</button></a>
      </div>


      <div id="slider-wrapper">
        <div id="card-slider">
          <ul>
            
            <li>
              <div class="card-container">
                <div class="card">
                  <div class="front"><img src="img/cards/<?php echo imageDirectory($country);?>card-1.jpg" alt="Card 1" data-image="card-1.jpg"></div>
                  <div class="back back-1"><textarea name="card-message" class="card-message ruby-ripple" placeholder="Max 20 words..."></textarea></div>
                </div>
              </div>
            </li>

            <li>
              <div class="card-container">
                <div class="card">
                  <div class="front"><img src="img/cards/<?php echo imageDirectory($country);?>card-2.jpg" alt="Card 2" data-image="card-2.jpg"></div>
                  <div class="back back-1"><textarea name="card-message" class="card-message ruby-ripple" placeholder="Max 20 words..."></textarea></div>
                </div>
              </div>
            </li>

            <li>
              <div class="card-container">
                <div class="card">
                  <div class="front"><img src="img/cards/<?php echo imageDirectory($country);?>card-3.jpg" alt="Card 3" data-image="card-3.jpg"></div>
                  <div class="back back-1"><textarea name="card-message" class="card-message ruby-ripple" placeholder="Max 20 words..."></textarea></div>
                </div>
              </div>
            </li>

            <li>
              <div class="card-container">
                <div class="card">
                  <div class="front"><img src="img/cards/<?php echo imageDirectory($country);?>card-4.jpg" alt="Card 4" data-image="card-4.jpg"></div>
                  <div class="back back-1"><textarea name="card-message" class="card-message" placeholder="Max 20 words..."></textarea></div>
                </div>
              </div>
            </li>

          </ul>
        </div>

        <div id="prev-wrapper" class="step-1"></div>
        <div id="next-wrapper" class="step-1"></div>

      </div>


      <div id="customisation-options" class="step-2">
        <div id="customise-font">
          <p>Choose a colour for your message</p>

          <div class="colour-option">
            <img src="img/cards/lipstick-1.png" alt="Ruby Ripple" data-color="ruby-ripple">
          </div>

          <div class="colour-option">
            <img src="img/cards/lipstick-2.png" alt="Scarlet Soaked" data-color="scarlet-soaked">
          </div>

          <div class="colour-option">
            <img src="img/cards/lipstick-3.png" alt="Iced Iris" data-color="iced-iris">
          </div>
      
        </div>


        <div id="customise-lips">
          <p>Choose a lip print to sign off your message</p>

          <div class="print-option">
            <img src="img/cards/lips-1.png" alt="Ruby Lips" data-print="back-1">
          </div>

          <div class="print-option">
            <img src="img/cards/lips-2.png" alt="Scarlet Lips" data-print="back-2">
          </div>

          <div class="print-option">
            <img src="img/cards/lips-3.png" alt="Iced Lips" data-print="back-3">
          </div>

        </div>


      </div>

      <div class="step-3" id="share-form-container">
        <div id="share-form">
          <?php 

          //Different countries have different APP IDs;
          if ($country=="uk") {
            $appID = "1767299846920612";
          }
          if ($country=="de") {
            $appID = "1926784140888004";
          }
          if ($country=="aus") {
            $appID = "1879203509027718";
          }

          $site = "http://lipstick.burtsbees.co.uk/card-display.php?id=CARDID";
          $facebookTimelineLink = "https://www.facebook.com/dialog/feed?app_id=".$appID."&link=".urlencode($site)."&name=".urlencode("Burt's Bees Discount Code")."&caption=".urlencode("Burts Bees")."&description=".urlencode("You've been sent a Burt's Bees discount code!")."&redirect_uri=".$site;

          $facebookMessage = "https://www.facebook.com/dialog/send?app_id=".$appID."&name="."Burts Bee's Discount Code"."&link=".urlencode($site)."&redirect_uri=".urlencode($site);

          $twitter = "https://twitter.com/intent/tweet?url=".urlencode($site)."&text=".urlencode("Check out my Burt's Bees card:");

          ?>

          <a href="<?php echo $facebookTimelineLink;?>" target="_blank" id="facebook-timeline-link"><button id="facebook-timeline">Post to facebook timeline</button></a>
          <a href="<?php echo $facebookMessage;?>" target="_blank" id="facebook-message-link"><button id="facebook-message">Send as a private facebook message</button></a>
          <a href="<?php echo $twitter;?>" target="_blank" id="tweet-link-link"><button id="tweet-link">Tweet a link to your card</button></a>


          <div id="share-divider"></div>
          <div id="form-break"></div>
          <p>Or you can send your card via email</p>

          <form id="share-form-fields">

            <label for="recipient-name" class="recipient-label">What's their name?</label>
            <input type="text" name="recipient-name" id="recipient-name">

            <label for="recipient-email" class="recipient-label">What's their email address?</label>
            <input type="text" name="recipient-email" id="recipient-email">

            <label for="sender-name" class="sender-label">What's your name?</label>
            <input type="text" name="sender-name" id="sender-name">

            <label for="sender-email" class="sender-label">Finally, your email address?</label>
            <input type="text" name="sender-email" id="sender-email">

            <input type="hidden" id="card-id" name="card-id" value="">
            <input type="hidden" id="chosen-card" name="chosen-card" value="card-1">
            <input type="hidden" id="chosen-font" name="chosen-font" value="ruby-ripple">
            <input type="hidden" id="chosen-lipstick" name="chosen-lipstick" value="ruby-ripple">
            <input type="hidden" id="chosen-message" name="chosen-message" value="">

            <div id="form-errors"><p></p></div>
            <img src="img/layout/ajax-loader.gif" alt="Loading Spinner" id="loading-spinner">

          </form>

        </div>
      </div>

      <button id="personalise-it" class="step-1">Personalise it</button>
      <button id="happy-with-that" class="step-2">Happy with that</button>
      <button id="share-send" class="step-3">Send</button>

    </div>
  </div>

</div>





<?php
include('includes/footer.php');