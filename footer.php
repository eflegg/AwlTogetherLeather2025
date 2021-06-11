<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$container = get_theme_mod('understrap_container_type');
?>

<footer class="d-flex">
   <div class="footer--left">
    <p>Awl Together Leather operates on the unceded territories of the xʷməθkʷəy̓əm (Musqueam), Sḵwx̱wú7mesh (Squamish), and Sel̓íl̓witulh (Tsleil-Waututh) Nations. We believe in land back – meaning a redistribution of land and wealth back into Indigenous hands. It’s part of our mandate to train and help marginalized communities enter professional leatherwork as both workers and owners. See Careers for more info or contact us at hiring@awltogetherleather.ca</p>
    <div class="footer--contact-us">
        <h3 class="mb-4">Contact Us</h3>
        <p>info@awltogetherleather</p>
        <p>(604) 875-8947</p>
        <p>#101-1183 Odlum Drive</p> <p>Vancouver, BC Canada</p>
      
    </div>
    <div class="copyright d-none d-md-block">
        <p>&copy;2021 Awl Together Leather</p>
    </div>
   </div>
   <div class="footer--right">
   <div class="footer--socials d-flex justify-content-end">
  
   <ion-icon name="logo-facebook" size="large"></ion-icon>
   <ion-icon name="logo-instagram" size="large"></ion-icon>
   <ion-icon name="logo-twitter" size="large"></ion-icon>

   </div>
<div class="single-tweet">
<a class="twitter-timeline" data-tweet-limit="1" data-width="300" data-height="200" data-theme="dark" href="https://twitter.com/AwlTogetherLthr?ref_src=twsrc%5Etfw">Tweets by AwlTogetherLthr</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    </div>
        <div class="footer--sign-up">
       
        <!-- <input type="text" placeholder="enter your email"> -->
        <form style="padding:3px;text-align:right;" action="https://tinyletter.com/awltogetherleather" method="post" target="popupwindow" onsubmit="window.open('https://tinyletter.com/awltogetherleather', 'popupwindow', 'scrollbars=yes,width=800,height=600');return true"><p><label for="tlemail">Sign up for our newsletter</label></p><p><input type="text" style="width:200px; background: #fff8e6; border: 0px;" name="email" id="tlemail" placeholder="Enter your email" /></p><input type="hidden" value="1" name="embed"/><input class="btn--primary btn--filled ml-auto"type="submit" value="Subscribe" /></form>
        
    </div>
    <div class="terms">
        <h3><a href="#">Terms & Conditions</a></h3>
    </div>
    <div class="copyright text-center d-block d-md-none">
        <p>&copy;2021 Awl Together Leather</p>
    </div>
   </div>
</footer>

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer();?>

</body>



</html>

