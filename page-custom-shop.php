<?php

/*
Template Name: Custom Shop
*/
get_header(); ?>

<?php while (have_posts()) : the_post(); ?>

    <main class="main-content">



        <?php include 'components/feature-prod-block.php'; ?>


        <section class="section-container layout-container">
            <?php
            $taxonomy = "product_cat";
            $dataType = "product";
            $category = "Shop Categories";
            $path = "components/cards/blog-card.php";
            ?>
            <?php include 'components/reusable-filter.php'; ?>

            <ul class="card-container products">

                <?php

                $args = array(
                    'post_type' => 'product',
                    'orderby' => 'menu_order',
                    'order' => 'ASC',
                    'posts_per_page' => -1,
                    'post_status'    => 'publish',

                );

                $taxonomy = "product_cat";
                $the_query = new WP_Query($args); ?>
                <?php if ($the_query->have_posts()) : ?>
                    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                        <?php include 'components/cards/blog-card.php'; ?>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>
            </ul>



        </section>
    </main>

<?php
endwhile;
?>


<?php get_footer(); ?>