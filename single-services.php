<?php get_header();?>


<div class="service-single--container">
<div class=" page-title title text-left d-flex">
    <h1><?php wp_title( '' );?></h1>
    <hr>
</div>
    <div class="service--inner row">
        <div class="service-description col-12 col-md-6">
            <?php
            $serviceDescrip = get_field('service_description');
            if($serviceDescrip):?>
            <p>
            <?php echo $serviceDescrip;?>
            </p>
            <?php endif;?>
            <div class="btn--primary ">
            Book Intake
        </div>
        </div>
        <div class="service-image col-12 col-md-6">
        <img src=<?php echo get_the_post_thumbnail();?>>
        </div>
      
    </div>
    <div class="service-gallery">
        <?php 
        $images = get_field('service_gallery');
        $size = 'full'; // (thumbnail, medium, large, full or custom size)
        if( $images ): ?>
            <ul class="gallery--inner row">
                <?php foreach( $images as $image ): ?>
                    <li class="gallery--single col-12 col-sm-6 col-md-3">
                    <img src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>

    <?php 
    // Get the current post type
   $postType = get_post_type();?>
  
    <div class="btn--text d-flex">
      
            <i>&xrarr;</i>
            
            <?php echo '<a href="' . home_url().'/'.($postType) . '"><h3>Back to Services</h3></a>';
 ?>
        </a>
    </div>


</div>

<?php get_footer();?>