<?php
/*
Template Name: Careers Page
 */
?>

<?php get_header();?>

<?php while (have_posts()): the_post();?>

<div class="pl-5 page-title title text-left d-flex">
    <h1><?php the_title( '' );?></h1>
    <hr>
</div>

<div class="layout-container careers-container">
    <?php
    $careersLanding = get_field('careers_landing');
    $careersIntro= $careersLanding['careers_intro'];
    if($careersIntro):?>
    <div>
        <?php echo $careersIntro; ?>
    </div>
    <?php endif; ?>

    <div class="careers-listing">
        <h2>Current Postings</h2>
        <div class="listing-block--container row">
<?php
$args = array (
    'post_type'=> 'careers',
    'posts_per_page' => -1,
);
$careersQuery = new WP_query($args);
if($careersQuery->have_posts()): ?>
<?php while ($careersQuery->have_posts()): $careersQuery->the_post()?>
<div class="col-12 col-sm-6 block-outer"><?php include "components/listing-block.php";?>
    </div>
    <?php endwhile; endif; ?> 

    </div>
    </div>

</div>

<!-- close php loop -->
<?php endwhile;?>

<?php get_footer();?>