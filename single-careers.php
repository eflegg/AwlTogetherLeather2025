<?php get_header(); ?>



<div>

    <div class="feature-blog--inner">

        <div class="left">
            <a fade href="<?php the_permalink(); ?>">
                <h2><?php the_title(); ?></h2>
            </a>

            <?php
            $jobIntro = get_field('job_intro');
            if ($jobIntro): ?>

                <a fade href="<?php the_permalink(); ?>">
                    <p><?php echo $jobIntro; ?></p>
                </a>
            <?php endif; ?>

        </div>
        <?php if (has_post_thumbnail($post->ID)): ?>
            <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail');

            ?>
            <div class="right" style="background-image: url('<?php echo $image[0]; ?>');">


            <?php endif; ?>
            </div>

    </div>


    <!-- old career single header layout in case they want it -->
    <!-- <div class="service--inner row align-items-start">
        <div class="service-description col-12 col-md-6">
            <div class=" page-title title text-left d-flex flex-column">
                <h1><?php the_title(''); ?></h1>
                <hr class="text-left ml-3">
            </div>


        </div>
        <div class="service-image col-12 col-md-6">
            <img src=<?php echo get_the_post_thumbnail(); ?>>
        </div>
    </div> -->
    <div class="job-requirements  layout-container careers-container">
        <?php
        $jobReqs = get_field('job_requirements');
        if ($jobReqs): ?>
            <?php echo $jobReqs; ?>
        <?php endif; ?>
    </div>
    <div class="job-considerations">
        <h3>Other Considerations</h3>
        <?php
        $jobConsider = get_field('job_considerations');
        if ($jobConsider): ?>
            <?php echo $jobConsider; ?>
        <?php endif; ?>
    </div>


</div>

<?php get_footer(); ?>