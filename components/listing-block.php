<a href=<?php the_permalink(); ?>><div class="block-container">
    <div class="block-image">
<img src="https://picsum.photos/400" alt="">
    </div>
    <div class="block-text">
    <?php
    $serviceTitle = get_field('service_title');
    if($serviceTitle):?>
        <h3><?php echo $serviceTitle; ?></h3>
        <?php endif; ?>
    <?php
    $listingExcerpt = get_field('listing_excerpt');
    if($listingExcerpt):?>
        <p><?php echo $listingExcerpt; ?></p>
        <?php endif; ?>
    </div>
</div>
</a>




