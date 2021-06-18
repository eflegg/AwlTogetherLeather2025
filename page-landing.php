<?php
/*
Template Name: Landing Page
 */
?>
<?php get_header();?>
<?php while (have_posts()): the_post();?>

<div class="landing--outer">
    <div class="layout-container">
        <h1><?php echo get_bloginfo();?></h1>
        <?php 
        $landingArrow = get_field('landing_arrow');
        $image = $landingArrow['image_item'];
        if($image):?>
        <div class="landing--arrow">

            <?php include 'components/image.php';?>
        </div>
        <?php endif;?>
     
        <div class="landing--inner">
            <div class="landing-text--container">
            <div class="landing-image">
                    <?php 
                    $landingImage = get_field('landing_image');
                    $image = $landingImage['image_item'];
                    if($image):?>
                    <?php include 'components/image.php';?>
                    <?php endif; ?>
                </div>
                <div>
                    <?php
                    $landingTitle = get_field('landing_page_title');
                    if($landingTitle):?>
                    <h2><?php echo $landingTitle; ?></h2>
                    <?php endif; ?>
                    <?php
                    $landingDescrip = get_field('landing_description');
                    if($landingDescrip):?>
                    <p><?php echo $landingDescrip;?></p>
                    <?php endif; ?>
                </div>
               
            </div>
            <?php
            $landingSignup = get_field('signup_text');
            if($landingSignup):?>
            <div class="landing-page--signup">
                  <!-- <input type="text" placeholder="enter your email"> -->
                  <form class="landing-signup-form"style="padding:3px;text-align:right;" action="https://tinyletter.com/awltogetherleather" method="post" target="popupwindow" onsubmit="window.open('https://tinyletter.com/awltogetherleather', 'popupwindow', 'scrollbars=yes,width=800,height=600');return true"><p><label for="tlemail"><?php echo $landingSignup;?></label></p><p><input type="text" style="width:200px; background: #fff8e6; border: 0px;" name="email" id="tlemail" placeholder="Enter your email" /></p><input type="hidden" value="1" name="embed"/><input class="btn--primary btn--filled ml-auto"type="submit" value="Subscribe" /></form>
            </div>
            <?php endif; ?>
        </div>
        <a href="<?php echo esc_url(home_url('/')); ?>">
        <div class="back-home d-flex">
            
         
            <i class="btn-arrow--about">&xrarr;</i>
            <h3>Home</h3>
        </div>
    </a>
    </div>

</div>

<!-- close php loop -->
<?php endwhile;?>

<?php get_footer();?>