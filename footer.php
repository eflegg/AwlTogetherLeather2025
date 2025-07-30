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
    <?php

    $land = get_field('land_acknowledgement', 'option');
    if($land) :?>
        <p><?php echo $land; ?></p>
        <?php endif; ?>

    <div class="footer--contact-us">
        <h3 class="mb-4">Contact Us</h3>
    <?php
    $email = get_field('contact_email', 'option');
    if($email):?>
        <p class="footer-email"><a href="mailto:<?php echo $email;?>"><?php echo $email;?></a></p>
        <?php endif; ?>
        <?php
        $phone = get_field('contact_number', 'option');
        if($phone):?>
        <p><?php echo $phone;?></p>
        <?php endif; ?>
        <?php
        $street = get_field('street_address', 'option');
        if($street):?>
         <p><?php echo $street;?></p>
         <?php endif; ?>
         <?php
        $cityProvince = get_field('city_province', 'option');
        if($cityProvince):?>
       <p><?php echo $cityProvince;?></p>
         <?php endif; ?>
         <?php
         $postalCode = get_field('postal_code', 'option');
        if($postalCode):?>
       <p><?php echo $postalCode;?></p>
         <?php endif; ?>
       
      
    </div>
    <div class="copyright d-none d-md-block">
        <p>&copy;<?php echo date("Y");?> Awl Together Leather</p>
    </div>
   </div>

<div class="footer-peach">
    <?php 
    $image = get_field('footer_peach', 'option');
    if($image):?>
    <?php 
    $imageUrl = $image['url'];
    if($imageUrl):?>
    <img src="<?php echo $imageUrl;?>" alt="">
    <?php endif; ?>
     <?php endif; ?>
</div>

   <div class="footer--right">
	     <div class="footer--hours">
            <h3 class="mb-4">Hours</h3>
            <?php
            $hours = get_field('hours', 'option');
            if($hours):?>
        <p><?php echo $hours;?></p>
            <?php endif; ?>
    </div>
   <div class="footer--socials d-flex justify-content-end">
 <?php
   $facebook = get_field('facebook_link', 'option');
  if($facebook):?> 
  <a href="<?php echo $facebook;?>" target="_blank">
   <ion-icon name="logo-facebook" size="large"></ion-icon>
  </a>
  <?php endif; ?>
  <?php
   $instagram = get_field('instagram_link', 'option');
  if($instagram):?> 
  <a href="<?php echo $instagram;?>" target="_blank">
   <ion-icon name="logo-instagram" size="large"></ion-icon>
  </a>
  <?php endif; ?>
   <?php
  $twitter = get_field('twitter_link', 'option');
  if($twitter):?> 
  <a href="<?php echo $twitter;?>" target="_blank">
   <ion-icon name="logo-twitter" size="large"></ion-icon></a>
   <?php endif;?>

   </div>

        <div class="footer--sign-up">
       
  				<article>
        			<?php echo do_shortcode('[ninja_form id=2]');?>
    			</article>
        
    </div>
    <div class="terms">
    <?php
			$posts = get_field('terms_link', 'option');
			if( $posts ): ?>
					<?php foreach( $posts as $post):  ?>
							<?php setup_postdata($post); ?>
                            <h3>
									<a
							
									href="<?php the_permalink(); ?>">
									Terms & Conditions
								</a>
                                </h3>
					<?php endforeach; ?>
					<?php wp_reset_postdata(); ?>
			<?php endif; ?>
   
      
    </div>
    <div class="copyright text-center d-block d-md-none">
        <p>&copy;<?php echo date("Y");?> Awl Together Leather</p>
    </div>
   </div>
</footer>

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer();?>

</body>



</html>

