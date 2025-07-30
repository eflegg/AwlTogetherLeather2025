<?php get_header();?>

<div class="service-single--container">
   


    <div class="service--inner row align-items-start">
        <div class="service-description col-12 col-md-6">
        <div class=" page-title title text-left d-flex flex-column">
        <h1><?php the_title( '' );?></h1>
        <hr class="text-left ml-3">
    </div>
            <?php
            $jobIntro = get_field('job_intro');
            if($jobIntro):?>
            <p class="pr-4">
            <?php echo $jobIntro;?>
            </p>
            <?php endif;?>
           
        </div>
        <div class="service-image col-12 col-md-6">
            <img src=<?php echo get_the_post_thumbnail();?>>
        </div>
    </div>
    <div class="job-requirements">
        <?php
        $jobReqs = get_field('job_requirements');
        if($jobReqs):?>
        <?php echo $jobReqs;?>
        <?php endif;?>
    </div>
    <div class="job-considerations">
        <h3>Other Considerations</h3>
    <?php
        $jobConsider = get_field('job_considerations');
        if($jobConsider):?>
        <?php echo $jobConsider;?>
        <?php endif;?>
    </div>


</div>

<?php get_footer();?>