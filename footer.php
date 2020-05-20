<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$container = get_theme_mod('understrap_container_type');
?>

<footer>
    <h3 class="text-center m-5">&copy; 2020</h3>
</footer>

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer();?>

</body>

</html>

