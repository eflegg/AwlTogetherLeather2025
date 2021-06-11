<?php
/*
Template Name: Home Page
 */
?>

<?php get_header();?>

<?php while (have_posts()): the_post();?>

    <?php
    $homePage = get_field('home_page');?>
    
    <?php include "components/home-hero.php" ;?>
<?php
$serviceSection = $homePage['service_section'];
    $serviceText = $serviceSection['service_section_text'];
    if($serviceText):?>
    <div class="section--services layout-container">
    
        <h2 class="w-75 w-md-50"><?php echo $serviceText; ?></h2>
        <?php endif;?>
        
        <div class="listing-block--container row">
        <?php
        $args = array (
            'post_type' => 'services',
            'posts_per_page' => 4,
        );
        $homeServiceQuery = new WP_query($args);
        if($homeServiceQuery->have_posts()): ?>
        <?php while($homeServiceQuery->have_posts()):$homeServiceQuery->the_post()?>

            <div class="col-12 col-sm-6 block-outer"><?php include "components/listing-block.php";?></div>
            <?php endwhile; endif; ?> 
        </div>

        <div class="services--button">
        <?php 
        $button = $serviceSection['button'];
        if($button):?>
        <?php include 'components/button.php'; ?>
        <?php endif;?>
         
        </div>
    </div>

    <div class="section--accessibility d-flex flex-column flex-lg-row align-items-center">
        <div class="access-text">
        <?php 
        $accessSection = $homePage['access_section'];
        $accessTitle = $accessSection['access_section_title'];
        if($accessTitle):?>
            <h2><?php echo $accessTitle; ?></h2>
            <?php endif; ?>
            <?php
            $accessText = $accessSection['access_section_text'];
            if($accessText):?>
            <p><?php echo $accessText;?></p>
            <?php endif; ?>
            <?php
            $button = $accessSection['button'];
            if($button):?>
            <div class="btn--filled">
                <?php include 'components/button.php';?>
            </div>
            <?php endif; ?>
          
        </div>
        <div class="access-image">
        <?php
        $image = $accessSection['image_item'];
        if($image):?>
        <?php include 'components/image.php';?>
        <?php endif; ?>
           
        </div>
    </div>
    <div class="section--shop-slider">
        <h2 class="text-center">Shop</h2>
        <div class="product-slider">
            <?php echo
            do_shortcode( '[wcpscwc_pdt_slider type="products"]');
            ?>
        </div>
        <?php
        $shopSection = $homePage['shop_section'];
        $button = $shopSection['button'];
        if($button):?>
        <div class="text-center mt-5 mx-auto d-table">
            <?php include 'components/button.php';?>
            <?php endif; ?>
        </div>
    </div>





     
 





<!-- close php loop -->
<?php endwhile;?>

<?php get_footer();?>



