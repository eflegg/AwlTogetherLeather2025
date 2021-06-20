<?php
/*
Template Name: Services Page
 */
?>

<?php get_header();?>
<?php while (have_posts()): the_post();?>

<div class="pl-5 page-title title text-left d-flex">
    <h1 class="text-left"><?php the_title( '' );?></h1>
    <hr>
</div>
    <div class="layout-container">
        <?php 
        $servicesIntro = get_field('services_intro');
        if($servicesIntro):?>
        <div class="services--description"><p><?php echo $servicesIntro; ?></p>
    </div>
    <?php endif; ?>
    <div class="listing-block--container row">
        <?php
        $args = array (
            'post_type' => 'services',
            'posts_per_page' => -1,
            'orderby'=> 'menu_order',
            'order'=> 'ASC',
        );
        $servicesQuery = new WP_query($args);
        if($servicesQuery->have_posts()) :?>
        <?php while($servicesQuery->have_posts()): $servicesQuery->the_post()?>
        <div class="col-12 col-sm-6 block-outer"><?php include "components/listing-block.php";?>
    </div>
    <?php endwhile; endif; ?>        
    </div><!-- .listing-block--container -->
</div><!-- .layout-container -->

<!-- close php loop -->
<?php endwhile;?>

<?php get_footer();?>