

<div class="home-banner--container text-center">
    <?php 
    $bannerLink = get_field('home_banner_link', 'option');
    if($bannerLink):?>
    <a class="home-banner--link" href="<?php echo $bannerLink; ?>">
    <?php endif; ?>
    <?php
    $bannerText = get_field('home_banner_text', 'option');
    if($bannerText):?>
        <p class="mb-0"><?php echo $bannerText;?></p>
        <?php endif; ?>
    </a>
</div>