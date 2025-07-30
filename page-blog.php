<?php
/*
Template Name: Blog Page
 */
?>

<?php get_header();?>

<?php while (have_posts()): the_post();?>

<div class="layout-container">
    <!-- test for page title here. could be blog -->
    <div class="pl-5 page-title title text-left d-flex">
    <h1><?php the_title( '' );?></h1>
    <hr>
	</div>

    <div class="grid access-grid--container">
        <div class="vertline">
    </div>

    <?php
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $args = array (
        'post_type' => 'post',
        'posts_per_page' => 6,
        'paged' => $paged
    );
    $blogQuery = new WP_query($args);

    if ( $blogQuery->have_posts() ) : 
        ?>
         <?php the_posts_pagination(); ?>
            <?php while( $blogQuery->have_posts() ) : $blogQuery->the_post() ?>
            <div class="access-block--outer item">
                <div class="content pb-5 p-md-5 blog-listing--inner">
            
                    <?php
                    the_title(
                        sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
                        '</a></h2>'
                    );
                    ?>
                    <div class="entry-content">

                        <?php the_excerpt(); ?>
                        <?php
                        wp_link_pages(
                            array(
                                'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
                                'after'  => '</div>',
                                )
                            );
                            ?>

                    </div>
                </div>
        </div>
            <?php endwhile ?>
        <div class="pagination">
            <?php 
            echo paginate_links( array(
                'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                'total'        => $blogQuery->max_num_pages,
                'current'      => max( 1, get_query_var( 'paged' ) ),
                'format'       => '?paged=%#%',
                'show_all'     => false,
                'type'         => 'plain',
                'end_size'     => 2,
                'mid_size'     => 1,
                'prev_next'    => true,
                'prev_text'    => sprintf( '<i></i> %1$s', __( 'Newer Posts', 'text-domain' ) ),
                'next_text'    => sprintf( '%1$s <i></i>', __( 'Older Posts', 'text-domain' ) ),
                'add_args'     => false,
                'add_fragment' => '',
            ) );
            ?>
        </div>
           
        <?php else : ?>
           <p>no posts</p>
        <?php endif ?>
       
</div>
<!-- <div class="pagination">
<?php get_the_posts_pagination() ?>
</div> -->

    <!-- test for outgoing messsage here. text + button -->
</div>


<!-- close php loop -->
<?php endwhile;?>

<?php get_footer();?>