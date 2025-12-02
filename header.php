<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>

<?php wp_head(); ?>

</head>

<?php 

$colour = '#3857a2';

if(get_field('sig_colour') ):
	$colour = get_field('sig_colour');
	
endif;

?>



<body <?php body_class(); ?> style="--sigcolor: <?php echo $colour ?>;">
	<div class="site">
		<header id="header">
		<a href="#main"class="skiplink">Skip to content</a>
			<a class="home-logo" href=<?php echo home_url();?>>
				<?php
				$pageTitle = get_the_title();
				?>
			</a>
			<nav class="js-navigation"
				aria-hidden="true"
				aria-label="Main">
				<?php
				wp_nav_menu( array(
				    'theme_location' => 'primary',
					'menu_class' => 'navbar-nav',
                    'depth' => 0,
                    // 'walker' => new Nav_Walker(),
				) );
				?>
			</nav >
			<div class="header-buttons">
                <a href='<?php echo home_url('/shop'); ?>' class="btn--fat button  text-center"><span>Shop Now</span></a>
	
				<button class="search-field--custom d-flex no-btn">
						<?php get_search_form(); ?>
						<ion-icon name="search-outline" size="large"></ion-icon>
                </button>

		
			</div>
			<div class="js-hamburger-menu">
				<button 
				class="button btn-nav  button--red js-menu-button menu-toggle" 
					aria-expanded="false"
					aria-label="Menu"
					>
					<span class="screen-reader-text">Menu</span>
					<span class="burger-1"></span>
					<span class="burger-2"></span>
					<span class="burger-3"></span>
			
				</button>
			</div>
	
		</header>









<!-- 
		 -->





	





