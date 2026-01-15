<?php
/*
Template Name: Home Page
 */
?>

<?php get_header(); ?>
<main>

    <?php while (have_posts()): the_post(); ?>



        <?php
        $homePage = get_field('home_page'); ?>

        <?php include "components/home-hero.php"; ?>
        <?php
        $serviceSection = $homePage['service_section'];; ?>

        <div class="listing-block--container">
            <?php
            $args = array(
                'post_type' => 'services',
                'posts_per_page' => 4,
                'orderby' => 'menu_order',
                'order' => 'ASC',
            );
            $homeServiceQuery = new WP_query($args);
            if ($homeServiceQuery->have_posts()): ?>
                <?php while ($homeServiceQuery->have_posts()): $homeServiceQuery->the_post() ?>
                    <?php include "components/service-listing-block.php"; ?>
            <?php endwhile;
            endif; ?>
            <div class="services--button btn--green">
                <?php
                $button = $serviceSection['button'];
                if ($button): ?>
                    <?php include 'components/button.php'; ?>
                <?php endif; ?>

            </div>
        </div>



        <div class="fade-me section--accessibility ">
            <?php
            $accessSection = $homePage['access_section']; ?>
            <?php
            $accessTitle = $accessSection['access_section_title'];
            if ($accessTitle): ?>
                <h2 class="layout-container"><?php echo $accessTitle; ?></h2>
            <?php endif; ?>

            <div class="layout-container d-flex flex-column flex-lg-row align-items-center">


                <div class="access-image">
                    <?php
                    $image = $accessSection['image_item'];
                    if ($image): ?>
                        <?php include 'components/image.php'; ?>
                    <?php endif; ?>

                </div>

                <div class="access-text">
                    <?php

                    $accessText = $accessSection['access_section_text'];
                    if ($accessText): ?>
                        <p><?php echo $accessText; ?></p>
                    <?php endif; ?>
                    <?php
                    $button = $accessSection['button'];
                    if ($button): ?>
                        <div class="btn--green">
                            <?php include 'components/button.php'; ?>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
        <section class="shop-section">
            <?php include 'components/feature-prod-block.php'; ?>
        </section>
        <div class="section--shop-slider">
            <div class="product-slider">
                <?php echo
                do_shortcode('[wcpscwc_pdt_slider type="products" dots="false" slide_to_show="4"]');
                ?>
            </div>
            <?php
            $shopSection = $homePage['shop_section'];
            $button = $shopSection['button'];
            if ($button): ?>
                <div class="text-center mt-5 mx-auto d-table">
                    <?php include 'components/button.php'; ?>
                <?php endif; ?>
                </div>
        </div>
        <section class="blog-section_home">
            <?php include "components/feature-blog-block.php"; ?>
        </section>


        <!-- close php loop -->
    <?php endwhile; ?>
</main>

<?php get_footer(); ?>