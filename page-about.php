<?php
/*
Template Name: About Page
 */
?>

<?php get_header();?>

<?php while (have_posts()): the_post();?>

<div class="pl-5 page-title title text-left d-flex">
    <h1><?php wp_title( '' );?></h1>
    <hr>
</div>

<div class="layout-container about-container">
    <div class="about--hero-row row" >
        <div class="about--hero-img col-12 col-md-6">

        <?php
        $aboutPage = get_field('about_us');
        if($aboutPage):?>
        <?php
        $image = $aboutPage['image_item'];
        if($image) :?>
        <?php include 'components/image.php';?>
      <?php endif;?>
     
         
            <div class="about--hero-caption">
            <?php
            $aboutExcerpt = $aboutPage['about_blurb'];
            if($aboutExcerpt) :?>
                <p>
                <?php echo $aboutExcerpt; ?>
                </p>
                <?php endif;?>
            </div>
        </div>

       

        <?php
        $aboutText = $aboutPage['about_text'];
        if($aboutText): ?>
        
        <div class="about--hero-text col-12 col-md-6">
           <?php echo $aboutText; ?>
        </div>
        <?php endif;?>
    </div>
    <?php
        $aboutSubhead = $aboutPage['about_subheading'];
        if($aboutSubhead): ?>
            <div class="page-title text-right d-flex mr-0">
                <hr> 
                <h2><?php echo $aboutSubhead;?></h2>
            </div>
            <?php endif;?>


 


<div class="about--details row">
    <?php
    $rows = $aboutPage['about_details'];
    if($rows):?>

    <?php
        if( $rows ) {
            foreach( $rows as $row ) {
                $subTitle = $row['detail_title'];
                $subText = $row['detail_text'];
                echo '<div class="col-12 col-md-6 p-5">';
                echo '<h3 class="mb-5">' . $subTitle . '</h3>' . $subText . '</div>';
            }
            
        }
        ?>
  
</div>

<?php endif;?>




<div class="btn--text d-flex ml-auto mb-5 mr-5">
     
      <?php
      $button = $aboutPage['button'];
      if($button):?>
      <?php include 'components/button.php';?>
      <i class="btn-arrow--about">&xrarr;</i>
      <?php endif;?>
</div>

<?php endif;?>

    </div>
</div>



<!-- close php loop -->
<?php endwhile;?>

<?php get_footer();?>