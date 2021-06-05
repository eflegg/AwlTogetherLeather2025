<a href=<?php the_permalink(); ?>><div class="block-container">
    <div class="block-image">

    <?php echo get_the_post_thumbnail();?>
    </div>
    <div class="block-text">
    <?php
    $serviceTitle = get_field('service_title');
    if($serviceTitle):?>
        <h3><?php echo $serviceTitle; ?></h3>
    <?php endif; ?>
    
    <?php
    $collabTitle = get_field('collaboration_title');
    if($collabTitle):?>
    <h3><?php echo $collabTitle; ?></h3>
    <?php endif; ?>

    <?php
    $jobTitle = get_field('job_title');
    if($jobTitle):?>
        <h3><?php echo $jobTitle; ?></h3>
    <?php endif; ?>
        <?php
        $listingExcerpt = get_field('listing_excerpt');
        if($listingExcerpt):?>
            <p><?php echo $listingExcerpt; ?></p>
        <?php endif; ?>

        <?php
        $jobExcerpt = get_field('job_excerpt');
        if($jobExcerpt):?>
            <p><?php echo $jobExcerpt; ?></p>
        <?php endif; ?>

        <?php
        $collabExcerpt = get_field('collab_listing_excerpt');
        if($collabExcerpt):?>
            <p><?php echo $collabExcerpt; ?></p>
        <?php endif; ?>

    </div>
</div>
</a>




