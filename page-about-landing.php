<?php
/*
Template Name: Awl About Landing Page
 */
?>

<?php get_header(); ?>
<main>
    <?php while (have_posts()): the_post(); ?>


        <div class="green-gradient">
            <?php include "components/custom-page-header.php"; ?>
        </div>
        <div class="">
            <?php
            $excerpt = get_the_content();
            if ($excerpt): ?>
                <div class="landing-page--description layout-container">

                    <h2 class="h3"><?php echo $excerpt; ?></h2>
                </div>
            <?php endif; ?>
            <div class="listing-block--container">
                <?php
                $current_page_id = get_queried_object_id();
                $args = array(
                    'post_type'   => 'page', // Important: default is 'post'
                    'post_status' => 'publish',
                    //'post_parent' => 5495,     // Use the parent page's ID
                    'post_parent' => $current_page_id,
                    'order'       => 'DESC',
                    'posts_per_page' => -1,
                );
                $aboutLandingQuery = new WP_query($args);
                if ($aboutLandingQuery->have_posts()) : ?>
                    <?php while ($aboutLandingQuery->have_posts()): $aboutLandingQuery->the_post() ?>
                        <?php include "components/service-listing-block.php"; ?>

                <?php endwhile;
                endif; ?>
            </div><!-- .listing-block--container -->
        </div><!-- .layout-container -->

        <!-- close php loop -->
    <?php endwhile; ?>
</main>
<?php get_footer(); ?>