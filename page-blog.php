<?php
/*
Template Name: Blog Page
 */
?>

<?php get_header();?>

<?php while (have_posts()): the_post();?>



<section class="section-container layout-container">

    <?php 
        $taxonomy = "category";
        $dataType = "post"; 
        $category = "Blog Topics";
        $path = "components/cards/blog-card.php";
        ?>
    <?php include 'components/reusable-filter.php';?>

<ul class="card-container products">
       <!-- this is what shows all blog posts upon landing on the page  -->
    <?php
        $args = array(
            'post_type' => 'post',
         //'orderby' => 'menu_order',
          'order' => 'DESC',
            'post_status' => 'publish',
            'posts_per_page' => -1,
        
    );

        $taxonomy = "category";
    $the_query = new WP_Query( $args ); ?>
	     <?php if ( $the_query->have_posts() ) : ?>
                <?php while ( $the_query->have_posts() ) : $the_query->the_post();   ?>
                 
                <?php if($taxonomy):?>
                <?php include 'components/cards/blog-card.php';?>
                <?php endif;?>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>	 			    
            </ul>
</section>


<!-- <div class="pagination">
<?php get_the_posts_pagination() ?>
</div> -->

    <!-- test for outgoing messsage here. text + button -->
</div>


<!-- close php loop -->
<?php endwhile;?>

<?php get_footer();?>