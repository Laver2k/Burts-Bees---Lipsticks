<?php include('includes/header.php'); ?>

<?php
  //Default values for the card
  $card = "card-1";
  $back = "back-1";
  $message = "Here is your discount code!";
  $fontColour = "ruby-ripple";
  $id = 1;

  //Get the card
  if (isset($_GET["id"])) {
    $id = intval($_GET["id"]);
  } else {
    $id = 1;
  }


  $sql = "SELECT * FROM cards WHERE id=".$id."";

  //execute the query
  $data = $dbh->query($sql);
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  foreach($result as $output) {
    $message = $output["message"];
    $card = $output["card"];
    $back = $output["lipstickPrint"];
    $message = $output["message"];
    $fontColour = $output["fontColour"];
  }

  //Translate $output["lipstickPrint"] into a class we can use.
  switch($back) {
    case "ruby-ripple":
    $back = "back-1";
    break;
    case "scarlet-soaked":
    $back = "back-2";
    break;
    case "iced-iris":
    $back = "back-3";
    break;
  }






?>

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

    <div class="card-container">
      <div id="preview-card" class="card flippable">
      <div class="front"><img src="img/cards/<?php echo imageDirectory($country);?><?php echo $card; ?>" alt="Card"></div>
      <div class="back <?php echo $back; ?>"><textarea disabled name="card-message" class="card-message <?php echo $fontColour; ?>"><?php echo $message; ?></textarea></div>
      </div>
    </div>

    <?php 

    if ($country=="uk") {
      $link = "https://www.burtsbees.co.uk/natural-products/lips-lip-colour/lipstick.html";
    } else {
      $link = "http://burtsbees.com.au/natural-products/lips-lip-colour/lipstick.html";
    }
    ?>

    <a href="<?php echo $link; ?>"><button id="redeem-button">Redeem your discount now</button></a>

  </div>
</div>






<?php
include('includes/footer.php');