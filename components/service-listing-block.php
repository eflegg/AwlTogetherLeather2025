<div class="service-block__container content fade-me">
    <a aria-label="Links to page about <?php the_title(); ?>" class="service-block__image service-block__image--odd" href=<?php the_permalink(); ?>>
        <figure>
            <?php echo get_the_post_thumbnail(); ?>
        </figure>
    </a>

    <div class="service-block__text">
        <?php
        $serviceTitle = get_field('service_title'); ?>
        <a href=<?php the_permalink(); ?> aria-label="Links to page about <?php echo $serviceTitle; ?>">
            <?php
            if ($serviceTitle): ?>
                <h2><?php echo $serviceTitle; ?></h2>
            <?php endif; ?>

            <!-- excerpt -->
            <div class="text-image">
                <div class="text--inner">
                    <?php
                    $listingExcerpt = get_field('listing_excerpt');
                    if ($listingExcerpt): ?>
                        <p><?php echo $listingExcerpt; ?></p>
                    <?php endif; ?>
        </a>
        <!-- button -->
        <a href=<?php the_permalink(); ?> aria-label="Links to page about <?php echo $serviceTitle; ?>" class="btn btn--listing btn--primary btn--square">Learn More</a>
    </div>
    <a class="service-block__image service-block__image--even" aria-label="Links to page about <?php echo $serviceTitle; ?>" href=<?php the_permalink(); ?>>
        <figure>
            <?php echo get_the_post_thumbnail(); ?>
        </figure>
    </a>
</div>
</div>


</div>