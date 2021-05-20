<?php
/*
Template Name: Accessibility Page
 */
?>

<?php get_header();?>

<?php while (have_posts()): the_post();?>

<div class="layout-container">
    <!-- test for page title here. could be blog -->
    <div class="page-title text-right d-flex">
        <hr> 
        <h1>Accessibility</h1>
    </div>

    <div class="access-grid--container row">
        
        <div class="acces-block--outer col-12 col-md-6">
            <?php include 'components/blogAccess-listing.php'; ?>
        </div>
        <div class="acces-block--outer col-12 col-md-6">
            <?php include 'components/blogAccess-listing.php'; ?>
        </div>
        <div class="acces-block--outer col-12 col-md-6">
            <?php include 'components/blogAccess-listing.php'; ?>
        </div>
        <div class="acces-block--outer col-12 col-md-6">
            <?php include 'components/blogAccess-listing.php'; ?>
        </div>
       
    </div>

    <!-- test for outgoing messsage here. text + button -->
</div>


<!-- close php loop -->
<?php endwhile;?>

<?php get_footer();?>