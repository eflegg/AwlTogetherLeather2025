<?php
/**
 * The template for displaying all single posts
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>



	<div  id="content" tabindex="-1">

			<main class="site-main " id="main">

				<?php while ( have_posts() ) : the_post(); ?>

				<div class="home-hero--container">
				<div class="hero-img">
					<img src="https://picsum.photos/1200" alt="">
				</div>
				<header class="hero-text">
					<h1 class="text-center page--home__title"> <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?></h1>
					
				</header>
				</div>

					 <div class="layout-container blog--container">
					
					 <?php the_content(); ?>
					 
					 </div>

					<?php understrap_post_nav(); ?>
				

				

				<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->

	</div><!-- #content -->



<?php get_footer();
