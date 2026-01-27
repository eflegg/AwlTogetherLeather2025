<?php
/*
Template Name: Accessibility Page
 */
?>

<?php get_header(); ?>
<main>


    <div class="green-gradient">
        <?php include "components/custom-page-header.php"; ?>
    </div>


    <div class="layout-container accordion">
        <ul class="accordion-list">

            <?php
            $args = array(
                'post_type' => 'access-cat',
                'posts_per_page' => -1,
                'orderby' => 'menu_order',
                'order' => 'ASC',
            );
            $accessQuery = new WP_query($args);
            if ($accessQuery->have_posts()): ?>
                <?php while ($accessQuery->have_posts()) : $accessQuery->the_post() ?>


                    <?php include 'components/access-block.php'; ?>


            <?php endwhile;
            endif; ?>
        </ul>

        <div id="acessibility-audit"></div>

        <?php while (have_posts()): the_post();

            the_content(); ?>

    </div>






    <!-- close php loop -->
<?php endwhile; ?>
</main>
<?php get_footer(); ?>