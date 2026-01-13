<?php
/*
Template Name: Careers Page
 */
?>

<?php get_header(); ?>

<?php while (have_posts()): the_post(); ?>

    <div class="yellow-gradient">
        <?php include "components/custom-page-header.php"; ?>
    </div>

    <div class="layout-container careers-container">
        <?php
        $careersLanding = get_field('careers_landing');
        $careersIntro = $careersLanding['careers_intro'];
        if ($careersIntro): ?>
            <div>
                <?php echo $careersIntro; ?>
            </div>
        <?php endif; ?>

        <div class="careers-listing">
            <h2>Current Postings</h2>
            <!-- <div class="listing-block--container row"> -->
            <ul class="card-container products">
                <?php
                $args = array(
                    'post_type' => 'careers',
                    'posts_per_page' => -1,
                    // 'orderby' => 'menu_order',
                    'order' => 'DESC'
                );
                $careersQuery = new WP_query($args);
                if ($careersQuery->have_posts()): ?>
                    <?php while ($careersQuery->have_posts()): $careersQuery->the_post() ?>
                        <?php include 'components/cards/blog-card.php'; ?>
                <?php endwhile;
                endif; ?>
            </ul>
            <!-- </div> -->
        </div>

    </div>

    <!-- close php loop -->
<?php endwhile; ?>

<?php get_footer(); ?>