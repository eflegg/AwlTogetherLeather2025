<?php
/*
Template Name: FAQ Page
 */
?>

<?php get_header(); ?>

<?php while (have_posts()): the_post(); ?>


    <div class="green-gradient">
        <?php include "components/custom-page-header.php"; ?>
    </div>
    <div class="layout-container accordion">
        <ul class="accordion-list">
            <?php
            $args = array(
                'post_type' => 'faqs',
                'posts_per_page' => -1,
                'orderby' => 'menu_order',
                'order' => 'ASC',
            );
            $faqQuery = new WP_query($args);
            if ($faqQuery->have_posts()): ?>
                <?php while ($faqQuery->have_posts()) : $faqQuery->the_post() ?>


                    <?php include 'components/faq-block.php'; ?>


            <?php endwhile;
            endif; ?>
        </ul>
    </div>


    <!-- close php loop -->
<?php endwhile; ?>

<?php get_footer(); ?>