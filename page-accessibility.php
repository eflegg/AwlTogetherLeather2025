<?php
/*
Template Name: Accessibility Page
 */
?>

<?php get_header();?>

<?php while (have_posts()): the_post();?>

<div class="layout-container">
    <!-- test for page title here. could be blog -->
    <div class="pl-5 page-title title text-left d-flex">
        <h1><?php the_title( '' );?></h1>
        <hr>
    </div>

    <div class="grid access-grid--container">
        <div class="vertline">
        </div>

        <?php
        $args = array (
            'post_type' => 'access-cat',
            'posts_per_page' => -1,
        );
        $accessQuery = new WP_query($args);
        if($accessQuery ->have_posts()): ?>
        <?php while($accessQuery->have_posts()) : $accessQuery->the_post() ?>
        
        <div class="access-block--outer  item">
            <?php include 'components/blogAccess-listing.php'; ?>
        </div>
       
       <?php endwhile; endif; ?>
    </div>

</div>


<!-- close php loop -->
<?php endwhile;?>

<?php get_footer();?>