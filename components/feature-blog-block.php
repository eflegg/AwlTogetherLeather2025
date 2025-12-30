<div class="feature-blog--inner">

    <?php


    // The query
    $args =  array(
        'post_type'           => 'post',
        'post_status'         => 'publish',
        'ignore_sticky_posts' => 1,
        'posts_per_page'      => 1,
        'order'               => $order == 'asc' ? 'asc' : 'desc',
        'tag'           => 'featured-post'
    );
    ?>

    <?php


    $the_query = new WP_Query($args); ?>

    <?php if ($the_query->have_posts()) : ?>
        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
            <div class="left">
                <a fade href="<?php the_permalink(); ?>">
                    <h2><?php the_title(); ?></h2>
                </a>
                <a fade href="<?php the_permalink(); ?>">
                    <p><?php the_excerpt(); ?></p>
                </a>

            </div>
            <?php if (has_post_thumbnail($post->ID)): ?>
                <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail');
                // $background_url = esc_url($image_src[0]); 
                ?>
                <div class="right" style="background-image: url('<?php echo $image[0]; ?>');">


                <?php endif; ?>
                </div>

            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        <?php endif; ?>
</div>