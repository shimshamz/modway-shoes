<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Modway_Shoes
 */

?>

	<footer id="colophon" class="site-footer footer">
		<div class="container container-max footer-container">
			<div class="row">
				<div class="col-lg-5">
					<div class="footer__section">
						<div class="footer__logo-container">
							<img src="<?php echo get_stylesheet_directory_uri() . '/assets/brand/logo_white.png'; ?>" alt="Modway Shoes Logo" class="footer__logo">
						</div>
					</div>
				</div>
				<div class="col-md-6 order-md-2 col-lg-4">
					<div class="footer__section">
						<div class="footer__contact-info">
							<p class="footer__address">483 Church Street, Pietermaritzburg, <span class="no-wrap">KwaZulu-Natal</span>, 3201</p>
							<a href="tel:+27333422466" class="footer__contact-number">Phone: +27 33 342 2466</a>
							<a href="tel:+27333422466" class="footer__contact-number">WhatsApp: +27 60 353 0405</a>
							<a href="mailto:info@modwayshoes.com" class="footer__email">Email: info@modwayshoes.com</a>
						</div>
					</div>
				</div>
				<div class="col-md-6 order-md-1 col-lg-3">
					<div class="footer__section">
						<h5 class="footer__section-title">Useful Links</h5>
						<?php
						wp_nav_menu(
							array(
								'menu_class' => 'footer__menu-list',
								'container' => 'div',
								'container_class' => 'footer__menu',
								'theme_location' => 'footer',
							)
						);
						?>
					</div>
				</div>
			</div>
		</div>

		<div class="footer__copyright-container">
			<p class="footer__copyright">Copyright &#169; <?php echo date('Y'); ?> <a href="<?php echo site_url(); ?>">Modway Shoes</a>. All rights reserved.</p>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
