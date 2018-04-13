<?php include('config.php');?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Burt's Bees</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="img/layout/favicon.ico" rel="shortcut icon" />

        <link href="https://fonts.googleapis.com/css?family=Homemade+Apple|Montserrat:400,700" rel="stylesheet">
        <link rel="stylesheet" href="_/css/styles.css">
        <?php countryCSSSheet($country); ?>
        <link rel="stylesheet" href="_/css/featherlight.min.css">
    </head>
    <body id="<?php echo $country;?>">

      <header class="section background-yellow">
        <div class="content">
          <div id="header-left">
            <img src="img/layout/menu.png" id="menu-button" alt="Menu">
          </div>
          <div id="header-middle">
            <?php countryHomeLogo($country); ?>
          </div>
          <div id="header-right">

          </div>
        </div>
      </header>

      <nav id="main-nav" class="section">
        <ul>
          <?php
          outputCountryNavLinks($country);
          ?>
        </ul>
      </nav>

      <nav id="mobile-nav">
        <a href="#" id="close-button">&times;</a>
        <ul>
          <?php 
          outputCountryNavLinks($country); 
          ?>
        </ul>
      </nav>
