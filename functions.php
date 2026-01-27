<?php

/**
 * UnderStrap functions and definitions
 *
 * @package understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$understrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/jetpack.php',                         // Load Jetpack compatibility file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker. Trying to get deeper navigation? Check out: https://github.com/understrap/understrap/issues/567
	'/woocommerce.php',                     // Load WooCommerce functions.
	'/editor.php',                          // Load Editor functions.
	'/deprecated.php',                      // Load deprecated functions.
);

foreach ($understrap_includes as $file) {
	require_once get_template_directory() . '/inc' . $file;
}

//editing header on archive-product.php

add_action('woocommerce_before_shop_loop', 'shop_banner', 10);

function shop_banner()
{
	echo '<a href=" ' . home_url() . '/shop" class="btn btn--primary">Shop All</a>';
}


function my_add_excerpts_to_pages()
{
	add_post_type_support('page', 'excerpt');
}
add_action('init', 'my_add_excerpts_to_pages');
function my_theme_load_ionicons_font()
{
	// Load Ionicons font from CDN
	wp_enqueue_script('my-theme-ionicons', 'https://unpkg.com/ionicons@5.2.3/dist/ionicons.js', array(), '5.2.3', true);
}
add_action('wp_enqueue_scripts', 'my_theme_load_ionicons_font');


add_filter('woocommerce_product_tabs', 'woo_remove_product_tabs', 98);

function woo_remove_product_tabs($tabs)
{
	unset($tabs['description']);          // Remove the description tab
	unset($tabs['reviews']);          // Remove the reviews tab
	unset($tabs['additional_information']);   // Remove the additional information tab
	return $tabs;
}

//remove upsells
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_upsells', 15);


//add options page
if (function_exists('acf_add_options_page')) {

	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'page-abt'		=> false
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));
}



function enqueue_blogfilter_script()
{
	if (is_page_template('page-blog.php') || is_page_template('page-custom-shop.php')) {
		wp_enqueue_script('blogroll-script-handle', get_template_directory_uri() . '/src/js/blog-filter.js', array(), '1.0', true);
	}
}
add_action('wp_enqueue_scripts', 'enqueue_blogfilter_script');

function enqueue_custom_js()
{
	wp_enqueue_script('main-js', get_template_directory_uri() . '/src/js/custom-javascript.js', array('jquery'));
}
add_action('wp_enqueue_scripts', 'enqueue_custom_js');



//remind me what this is doing?
function custom_redirects()
{
	$post_type = 'access-cat';
	if (is_singular($post_type)) {
		wp_redirect(home_url('/accessibility/'));
		die;
	}
}
// add_action('template_redirect', 'custom_redirects');


add_filter(
	'excerpt_more',
	function ($more) {
		return '';
	},
	20
);

function wpshock_search_filter($query)
{
	if ($query->is_search) {
		$query->set('post_type', array('post', 'page'));
	}
	return $query;
}
add_filter('pre_get_posts', 'wpshock_search_filter');





//this is what makes the ajaxurl variable available site wide
add_action('wp_head', 'myplugin_ajaxurl');
function myplugin_ajaxurl()
{
	echo '<script type="text/javascript">
           var ajaxurl = "' . admin_url('admin-ajax.php') . '";
         </script>';
}


add_action('wp_ajax_ajaxfilter', 'rudr_ajax_filter_by_category');
add_action('wp_ajax_nopriv_ajaxfilter', 'rudr_ajax_filter_by_category');


function rudr_ajax_filter_by_category()
{

	$obj = json_decode(file_get_contents("php://input"), true);
	$catSlug = $obj['cat'];
	$postType = $obj['dataType'];
	// print_r($catSlug);
	// print_r($obj);
	// print_r($obj['tax']);

	$ajaxposts = new WP_Query([
		'post_type' => $postType,
		'posts_per_page' => -1,
		'order' => 'DESC',
		'post_status' => 'publish',
		'tax_query' => array(
			array(
				'taxonomy' => $obj['tax'],
				'field'    => 'slug', // Can also use 'term_id' or 'name'
				'terms'    => $catSlug, // Use the specific category slug
			),
		),
	]);
	$response = '';

	//this is what replaces the initial content of the blog page with the filtered content
	if ($ajaxposts->have_posts()) {
		while ($ajaxposts->have_posts()) : $ajaxposts->the_post();
			$response .= include 'components/cards/blog-card.php';

		endwhile;
		wp_reset_postdata();
	} else {
		$response = 'empty';
	}
	//this shows a tally of total number of responses
	// echo $response;

	exit;
	die;
}
