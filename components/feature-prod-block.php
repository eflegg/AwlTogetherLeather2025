<div class="feature-prod--inner">

    <?php
    $tax_query[] = array(
        'taxonomy' => 'product_visibility',
        'field'    => 'name',
        'terms'    => 'featured',
        'operator' => 'IN', // or 'NOT IN' to exclude feature products
    );

    // The query
    $args =  array(
        'post_type'           => 'product',
        'post_status'         => 'publish',
        'ignore_sticky_posts' => 1,
        'posts_per_page'      => 1,
        'order'               => $order == 'asc' ? 'asc' : 'desc',
        'tax_query'           => $tax_query
    );
    ?>

    <?php


    $the_query = new WP_Query($args); ?>

    <?php if ($the_query->have_posts()) : ?>
        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
            <div class="left">
                <?php if (has_post_thumbnail($post->ID)): ?>
                    <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail'); ?>
                    <figure>
                        <img src="<?php echo $image[0]; ?>" alt="">
                    </figure>
                <?php endif; ?>
            </div>
            <div class="right">
                <a fade href="<?php the_permalink(); ?>">
                    <h2><?php the_title(); ?></h2>
                </a>
                <a fade href="<?php the_permalink(); ?>">
                    <p><?php the_excerpt(); ?></p>
                </a>

            </div>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    <?php endif; ?>
</div>