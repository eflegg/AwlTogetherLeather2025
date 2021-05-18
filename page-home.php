<?php
/*
Template Name: Home Page
 */
?>

<?php get_header();?>

<?php while (have_posts()): the_post();?>

<header class="page--home">
    <h1 class="text-center page--home__title">Awl Together Leather</h1>
    <h3 class="text-center page--home__subtitle">Repairing the Future of Cobbling</h3>
</header>


<section class="layout-container">
    <article class="d-flex flex-row container--recipes">


        <?php $postType = 'recipe';?>
                <?php if ($postType): ?>
                    <?php
    // this file is going to have to have various post types to render...
    $args = (array(
        'post_type' => $postType,
        'posts_per_page' => -1,

    )
    );
    $query = new WP_Query($args);?>

	<?php if ($query->have_posts()): while ($query->have_posts()): $query->the_post();?>
																																														                        <?php endwhile;endif;
    wp_reset_postdata()?>
																	                            	<?php endif;?>


        <!-- <div class="col-12 col-sm-6 col-md-4 container--recipes__single">
            <img src="http://localhost:8888/whatsfordinner/wp-content/uploads/2020/03/147735EMfl120212-R1-005-2-scaled.jpg" alt="">
            <h3 class="mt-3">kimchi fried rice</h3>
        </div>
        <div class="col-12 col-sm-6 col-md-4 container--recipes__single">
            <img src="http://localhost:8888/whatsfordinner/wp-content/uploads/2020/03/33760012.jpg" alt="">
            <h3>kimchi fried rice</h3>
        </div>
        <div class=" col-12 col-sm-6 col-md-4 container--recipes__single">
            <img src="http://localhost:8888/whatsfordinner/wp-content/uploads/2020/03/34030022.jpg" alt="">
            <h3>kimchi fried rice</h3>
        </div>
        <div class="col-12 col-sm-6 col-md-4 container--recipes__single">
            <img src="http://localhost:8888/whatsfordinner/wp-content/uploads/2020/03/33760005.jpg" alt="">
            <h3>kimchi fried rice</h3>
        </div>
        <div class="col-12 col-sm-6 col-md-4 container--recipes__single">
            <img src="http://localhost:8888/whatsfordinner/wp-content/uploads/2020/03/34030023-scaled.jpg" alt="">
        </div>
        <div class="col-12 col-sm-6 col-md-4 container--recipes__single">
            <img src="http://localhost:8888/whatsfordinner/wp-content/uploads/2020/03/EF090320253391-20200311-07-scaled.jpg" alt="">
        </div>
        <div class="col-12 col-sm-6 col-md-4 container--recipes__single">
            <img src="http://localhost:8888/whatsfordinner/wp-content/uploads/2020/03/EF090320253391-20200311-08-scaled.jpg" alt="">
        </div>
        <div class="col-12 col-sm-6 col-md-4 container--recipes__single">
            <img src="http://localhost:8888/whatsfordinner/wp-content/uploads/2020/03/EF090320253391-20200311-06-scaled.jpg" alt="">
        </div> -->
    </article>
</section>





<!-- close php loop -->
<?php endwhile;?>

<?php get_footer();?>



