<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Modway_Shoes
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<header class="header">
		<div class="header-top">
			<div class="container container-max header-container">
				<!-- <ul class="header-top__list">
					<li class="header-top__list-item"><a href="#" class="header-top__link">Shipping</a></li>
					<li class="header-top__list-item"><a href="#" class="header-top__link">Returns</a></li>
				</ul> -->

				<div class="navigation-top">
					<?php
					wp_nav_menu(
						array(
							'menu_class' => 'navigation-top__list',
							'container' => 'nav',
							'container_class' => 'navigation-top__nav',
							'theme_location' => 'top',
						)
					);
					?>

					<div class="connect">
						<p class="connect__text">Connect with us</p>
						<div class="connect__icons-container">
							<a href="#">
								<svg class="icon" aria-label="Facebook" aria-hidden="true">
									<use xlink:href="<?php echo get_stylesheet_directory_uri() . '/assets/icons/symbol-defs.svg#icon-facebook'; ?>"></use>
								</svg>
							</a>
							<a href="#">
								<svg class="icon" aria-label="Instagram" aria-hidden="true">
									<use xlink:href="<?php echo get_stylesheet_directory_uri() . '/assets/icons/symbol-defs.svg#icon-instagram'; ?>"></use>
								</svg>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="header-main">
			<div class="container container-max header-container">
				<div class="navigation">
					<button class="navigation__btn" aria-label="Menu Toggle" tabindex="0">
						<span class="navigation__icon"></span>
					</button>

					<a href="<?php echo site_url(); ?>" class="header__logo-box">
						<img src="<?php echo get_stylesheet_directory_uri() . '/assets/brand/logo.png'; ?>" alt="Modway Shoes Logo" class="header__logo">
					</a>

					<?php
					wp_nav_menu(
						array(
							'menu_class' => 'navigation__list',
							'container' => 'nav',
							'container_class' => 'navigation__nav',
							'theme_location' => 'primary',
						)
					);
					?>

					<div class="navigation__right">
						<a href="#" class="cart-link">
							<svg class="icon icon-local_grocery_store">
								<use xlink:href="<?php echo get_stylesheet_directory_uri() . '/assets/icons/symbol-defs.svg#icon-local_grocery_store'; ?>"></use>
							</svg>
						</a>
					</div>
				</div>
			</div>
		</div>
	</header>
