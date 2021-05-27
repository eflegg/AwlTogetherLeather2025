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

    <div class="masonry-test access-grid--container row">

        <?php
        $args = array (
            'post_type' => 'access-cat',
            'posts_per_page' => -1,
        );
        $accessQuery = new WP_query($args);
        if($accessQuery ->have_posts()): ?>
        <?php while($accessQuery->have_posts()) : $accessQuery->the_post() ?>
        
        <div class="access-block--outer col-12 col-md-6">
            <?php include 'components/blogAccess-listing.php'; ?>
        </div>
       
       <?php endwhile; endif; ?>
    </div>

</div>


<!-- close php loop -->
<?php endwhile;?>

<?php get_footer();?>