<?php
/**
 * UnderStrap functions and definitions
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

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

foreach ( $understrap_includes as $file ) {
	require_once get_template_directory() . '/inc' . $file;
}

function my_theme_load_ionicons_font() {
	// Load Ionicons font from CDN
	wp_enqueue_script( 'my-theme-ionicons', 'https://unpkg.com/ionicons@5.2.3/dist/ionicons.js', array(), '5.2.3', true );
}
add_action( 'wp_enqueue_scripts', 'my_theme_load_ionicons_font' );


add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

function woo_remove_product_tabs( $tabs ) {
    unset( $tabs['description'] );          // Remove the description tab
    unset( $tabs['reviews'] );          // Remove the reviews tab
    unset( $tabs['additional_information'] );   // Remove the additional information tab
    return $tabs;
}

//add options page
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
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

//*WAYPOINTS
function waypoints_init() {
	wp_enqueue_script( 'waypointsJS-two', get_template_directory_uri() . '/js/waypoints/src/waypoint.js', true);
    wp_enqueue_script( 'waypointsJS', get_template_directory_uri() . '/js/waypoints/lib/noframework.waypoints.min.js', true);
	wp_enqueue_script( 'waypointAdapters', get_template_directory_uri() . '/js/waypoints/src/adapters/noframework.js', true);
}
add_action('wp_enqueue_scripts', 'waypoints_init');

function customWaypoints() {
	
		wp_enqueue_script( 'myWaypoints', get_template_directory_uri() . '/js/waypoints-custom.js', true);
		}
		add_action('wp_enqueue_scripts', 'customWaypoints');




function custom_redirects() {
	$post_type = 'access-cat';
    if ( is_singular($post_type ) ) {
        wp_redirect( home_url( '/accessibility/' ) );
        die;
    }
 
 
}
add_action( 'template_redirect', 'custom_redirects' );


function wpshock_search_filter( $query ) {
    if ( $query->is_search ) {
        $query->set( 'post_type', array('post','page') );
    }
    return $query;
}
add_filter('pre_get_posts','wpshock_search_filter');

