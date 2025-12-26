<div class="service-block__container content">
        <a class="service-block__image" href=<?php the_permalink(); ?>>
    <div >

    <?php echo get_the_post_thumbnail();?>
    </div>
</a>
 
<div class="service-block__text">
<a href=<?php the_permalink(); ?>>
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
    </a>
    <!-- button -->
<a href=<?php the_permalink(); ?> class="btn--primary btn--square">Learn More</a>
</div>


</div>




