<div class="home-hero--container">
   
    


       
     <div class="hero--image fade-in">
       
        <?php
        $heroImage = $homePage['hero_image'];
        $image = $heroImage['image_item'];
        if($image):?>
        <?php include 'image.php';?>
        <?php endif;?>
      
    </div>
      <div class="cream-circle">
            
        </div>
    <div class="hero-text">
        <h1 class="page--home__title fade-slide-in"><?php echo get_bloginfo();?></h1>
        <h3 class="text-center page--home__subtitle fade-slide-in delay"><?php echo get_bloginfo('description');?></h3>
            <?php
        $serviceSection = $homePage['service_section'];
        $serviceText = $serviceSection['service_section_text'];
        if($serviceText):?>
        <div class="services--text">
            <h2 id="waypoint"class=""><?php echo $serviceText; ?></h2>
    <?php endif;?> 
      
 <?php
            $button = $heroImage['button'];
            if($button):?>
            <div class="btn--green">
                <?php include 'button.php';?>
            </div>
            <?php endif; ?>
            </div>
    </div>
  
</div>