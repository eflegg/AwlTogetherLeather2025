<div class="home-hero--container">
    <div class="hero-img">
    <?php
   
    $heroImage = $homePage['hero_image'];
    $image = $heroImage['image_item'];
    if($image):?>
    <?php include 'image.php';?>
    <?php endif;?>
    


        <img src="https://picsum.photos/1200" alt="">
    </div>
    <div class="overlay"></div>
    <header class="hero-text">
        <h1 class="text-center page--home__title"><?php echo get_bloginfo();?></h1>
        <h3 class="text-center page--home__subtitle"><?php echo get_bloginfo('description');?></h3>
    </header>
</div>