<?php

/**
 * The template for displaying all single posts
 *
 * @package understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
$container = get_theme_mod('understrap_container_type');
?>



<div id="content" tabindex="-1">

	<main class="site-main " id="main">

		<?php while (have_posts()) : the_post(); ?>

			<?php $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); ?>
			<div class="home-hero--container blog-container" style="background-image: url('<?php echo $thumb['0']; ?>')">



				<div class="overlay"></div>
				<h1 class="layout-container blog--title"><?php the_title(''); ?></h1>

			</div>

</div>

<div class="layout-container blog--container">

	<?php the_content(); ?>

</div>

<?php understrap_post_nav(); ?>




<?php endwhile; // end of the loop. 
?>

</main><!-- #main -->

</div><!-- #content -->



<?php get_footer();
