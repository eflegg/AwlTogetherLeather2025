<?php
/*
Template Name: Blog Page
 */
?>

<?php get_header();?>

<?php while (have_posts()): the_post();?>

<div class="layout-container">
    <!-- test for page title here. could be blog -->
    <div class="page-title text-right d-flex">
        <hr> 
        <h1>Blog</h1>
    </div>

    <div class="access-grid--container row">

    <?php
    $args = array (
        'post_type' => 'post',
        'posts_per_page' => 6,
    );
    $blogQuery = new WP_query($args);

    if ( $blogQuery->have_posts() ) : 
        ?>
            <?php while( $blogQuery->have_posts() ) : $blogQuery->the_post() ?>
            <div class="acces-block--outer col-12 col-md-6">
            <?php include 'components/blogAccess-listing.php'; ?>
        </div>
            <?php endwhile ?>
        <?php else : ?>
           <p>no posts</p>
        <?php endif ?>
       
    </div>

    <!-- test for outgoing messsage here. text + button -->
</div>


<!-- close php loop -->
<?php endwhile;?>

<?php get_footer();?>