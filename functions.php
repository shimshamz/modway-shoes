<?php
/**
 * Modway Shoes functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Modway_Shoes
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'modway_shoes_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function modway_shoes_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Modway Shoes, use a find and replace
		 * to change 'modway-shoes' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'modway-shoes', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary', 'modway-shoes' ),
				'top' => esc_html__( 'Top', 'modway-shoes' ),
				'footer' => esc_html__( 'Footer', 'modway-shoes' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'modway_shoes_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'modway_shoes_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function modway_shoes_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'modway_shoes_content_width', 640 );
}
add_action( 'after_setup_theme', 'modway_shoes_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
// function modway_shoes_widgets_init() {
// 	register_sidebar(
// 		array(
// 			'name'          => esc_html__( 'Sidebar', 'modway-shoes' ),
// 			'id'            => 'sidebar-1',
// 			'description'   => esc_html__( 'Add widgets here.', 'modway-shoes' ),
// 			'before_widget' => '<section id="%1$s" class="widget %2$s">',
// 			'after_widget'  => '</section>',
// 			'before_title'  => '<h2 class="widget-title">',
// 			'after_title'   => '</h2>',
// 		)
// 	);
// }
// add_action( 'widgets_init', 'modway_shoes_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function modway_shoes_scripts() {
	// Bootstrap
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/bootstrap-grid.min.css', array(), _S_VERSION );
	
	// Custom
	wp_enqueue_style( 'modway-shoes-style', get_stylesheet_uri(), array(), _S_VERSION );

	// Custom Scripts
	wp_enqueue_script( 'menu-toggle', get_template_directory_uri() . '/js/menu-toggle.js', array(), false, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'modway_shoes_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * ========================================================
 * 	WooCommerce Changes
 * ========================================================
 */

function modway_shoes_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
	// add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'modway_shoes_add_woocommerce_support' );

// Remove breadcrumbs if single product page
add_filter('woocommerce_before_main_content', 'remove_breadcrumbs');
function remove_breadcrumbs() {
	if (is_product()) {
		remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb', 20, 0);
	}
}

// Disable default WooCommerce styles
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );


// Remove tabs and add long description
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
add_action( 'woocommerce_single_product_summary', 'wc_output_long_description', 70 );
  
function wc_output_long_description() {
?>
   <div class="product__long-description">
    <?php the_content(); ?>
   </div>
<?php
}

// Modify the default WooCommerce orderby dropdown
// Options: menu_order, popularity, rating, date, price, price-desc
// Remove menu_order
function ms_woocommerce_catalog_orderby( $orderby ) {
	unset($orderby["menu_order"]);
	unset($orderby["rating"]);
	return $orderby;
}
add_filter( "woocommerce_catalog_orderby", "ms_woocommerce_catalog_orderby", 30 );

// Remove result count
remove_action( 'woocommerce_before_shop_loop','woocommerce_result_count', 20 );

// Remove ordering (moved into header)
remove_action( 'woocommerce_before_shop_loop','woocommerce_catalog_ordering', 30 );

// Add custom class to product loop title
function ms_woocommerce_product_loop_title_classes($class) {
	return $class . ' ms-loop-item__title ms-loop-product__title';
}
add_filter( 'woocommerce_product_loop_title_classes', 'ms_woocommerce_product_loop_title_classes' );

// Remove add-to-cart from product loop item
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);

// Remove count from category title
remove_action( 'woocommerce_shop_loop_subcategory_title', 'woocommerce_template_loop_category_title', 10);
function ms_woocommerce_template_loop_category_title( $category ) {
	?>
	<h2 class="woocommerce-loop-category__title ms-loop-item__title ms-loop-category__title">
		<?php
		echo esc_html( $category->name );

		// if ( $category->count > 0 ) {
		// 	// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		// 	echo apply_filters( 'woocommerce_subcategory_count_html', ' <mark class="count">(' . esc_html( $category->count ) . ')</mark>', $category );
		// }
		?>
	</h2>
	<?php
}
add_action( 'woocommerce_shop_loop_subcategory_title', 'ms_woocommerce_template_loop_category_title', 10);