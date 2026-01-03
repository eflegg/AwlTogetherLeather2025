<?php
/*
Template Name: Services Page
 */
?>

<?php get_header(); ?>
<?php while (have_posts()): the_post(); ?>


    <div class="green-gradient">
        <?php include "components/custom-page-header.php"; ?>
    </div>
    <div class="">
        <?php
        $servicesIntro = get_field('services_intro');
        if ($servicesIntro): ?>
            <div class="services--description layout-container">
                <p><?php echo $servicesIntro; ?></p>
            </div>
        <?php endif; ?>
        <div class="listing-block--container">
            <?php
            $args = array(
                'post_type' => 'services',
                'posts_per_page' => -1,
                'orderby' => 'menu_order',
                'order' => 'ASC',
            );
            $servicesQuery = new WP_query($args);
            if ($servicesQuery->have_posts()) : ?>
                <?php while ($servicesQuery->have_posts()): $servicesQuery->the_post() ?>
                    <?php include "components/service-listing-block.php"; ?>

            <?php endwhile;
            endif; ?>
        </div><!-- .listing-block--container -->
    </div><!-- .layout-container -->

    <!-- close php loop -->
<?php endwhile; ?>

<?php get_footer(); ?>