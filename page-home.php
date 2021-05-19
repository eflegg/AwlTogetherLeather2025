<?php
/*
Template Name: Home Page
 */
?>

<?php get_header();?>

<?php while (have_posts()): the_post();?>

   <?php include "components/home-hero.php" ;?>

    <div class="layout-container">
        <h2 class="w-50">We’re repairing the future of leatherworks, one sole at a time</h2>
        <div class="listing-block--container layout-container row">
            <div class="col-12 col-md-6"><?php include "components/listing-block.php";?></div>
            <div class="col-12 col-md-6"><?php include "components/listing-block.php";?></div>
            <div class="col-12 col-md-6"><?php include "components/listing-block.php";?></div>
            <div class="col-12 col-md-6"><?php include "components/listing-block.php";?></div>
        </div>
    </div>







     
 





<!-- close php loop -->
<?php endwhile;?>

<?php get_footer();?>



