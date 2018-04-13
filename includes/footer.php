<!-- Footer-->
<footer class="section background-white">
  <div id="social-links">
  <?php
  outputFooterSocialLinks($country);
  ?>
  </div>  

  <ul>
  <?php
  outputFooterLinks($country);
  ?>
  </ul>
</footer>


  <script>window.jQuery || document.write('<script src="_/js/min/jquery-1.11.3.min.js"><\/script>')</script>
  <script src="_/js/min/skrollr.min.js"></script>
  <script src="_/js/min/jquery.countdown.min.js"></script>
  <script src="_/js/min/jquery.bxslider.js"></script>
  <script src="_/js/scripts.js"></script> 

 
   <!-- <script src="_/js/min/scripts-min.js"></script>-->

  <?php
  if($country=="uk"){
  ?>
  <script>
  //Postcode lookup
  (function (a, c, b, e) {
      a[b] = a[b] || {}; a[b].initial = { accountCode: "BURTS11113", host: "BURTS11113.pcapredict.com" };
      a[b].on = a[b].on || function () { (a[b].onq = a[b].onq || []).push(arguments) }; var d = c.createElement("script");
      d.async = !0; d.src = e; c = c.getElementsByTagName("script")[0]; c.parentNode.insertBefore(d, c)
  })(window, document, "pca", "//BURTS11113.pcapredict.com/js/sensor.js");
  </script>
  <?php
  }
  ?>

  <?php
  switch($country) {
    case "uk":
    $gaCode = "UA-88651266-1";
    break;
    case "de":
    $gaCode = "UA-88651266-2";
    break;
    case "aus":
    $gaCode = "UA-88651266-3";
    break;

  }
  ?>

  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
    ga('create', '<?php echo $gaCode;?>', 'auto');
    ga('send', 'pageview');
  </script>

  <!-- Facebook Pixel Code -->
    <script>
    !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
    n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
    document,'script','https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '1728535524063091'); // Insert your pixel ID here.
    fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=1728535524063091&ev=PageView&noscript=1"
    /></noscript>
    <!-- DO NOT MODIFY -->
    <!-- End Facebook Pixel Code -->



  </body>
</html>
