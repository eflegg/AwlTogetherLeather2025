<!DOCTYPE html>
<html lang="en" dir="ltr" <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://use.typekit.net/axi2qeo.css">
	<title><?php wp_title('|', true, 'right'); ?></title>

	<?php wp_head(); ?>

</head>





<body>
	<?php
	$homeBanner = get_field('header_banner', 'option');
	if ($homeBanner === "Yes"): ?>
		<?php include 'components/home-banner.php'; ?>
	<?php endif; ?>
	<div class="site">
		<header id="header">
			<!-- skip link -->
			<a href="#main" class="skiplink sr-only sr-only-focusable">Skip to content</a>

			<!-- home link and title -->
			<?php if (is_front_page() && is_home()): ?>
				<h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" itemprop="url"><?php bloginfo('name'); ?></a></h1>

			<?php else: ?>

				<a class="navbar-brand" rel="home" href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" itemprop="url"><?php bloginfo('name'); ?></a>
			<?php endif; ?>

			<nav class="js-navigation"
				aria-hidden="true"
				aria-labelledby="main-nav-label">
				<h2 id="main-nav-label" class="sr-only">
					<?php esc_html_e('Main Navigation', 'understrap'); ?>
				</h2>
				<?php
				wp_nav_menu(array(
					'theme_location' => 'primary',
					'menu_class' => 'main navbar-nav',
					'container_class' => 'atl-nav-container',
					'container_id' => 'navbarNavDropdown',
					'depth' => 0,
					// 'walker' => new Nav_Walker(),
				));
				?>
			</nav>

			<div class="header-buttons">

				<button class="search-field--custom d-flex no-btn">
					<?php get_search_form(); ?>
				</button>
				<?php
				$buttonText = get_field('header_button_text', 'option');
				$buttonLink = get_field('header_button_link', 'option');
				if ($buttonText && $buttonLink): ?>
					<button class="btn btn--primary btn--nav ">
						<a

							href="<?php echo $buttonLink; ?>">
							<?php echo $buttonText; ?>
						</a>
					</button>
				<?php endif; ?>


				<div class="mini-cart ">
					<a href=<?php echo wc_get_cart_url(); ?> title="View your shopping cart"><ion-icon name="cart-outline" size="large"></ion-icon> <?php WC()->cart->get_cart_total(); ?> </a>
					<span class="cart-count"> <?php WC()->cart->cart_contents_count; ?> </span>
				</div>
				<div class="js-hamburger-menu">
					<button
						class="btn-nav  button--red js-menu-button menu-toggle"
						aria-expanded="false"
						aria-label="Menu">
						<span class="screen-reader-text">Menu</span>
						<span class="burger-1"></span>
						<span class="burger-2"></span>
						<span class="burger-3"></span>

					</button>
				</div>
			</div>

		</header>