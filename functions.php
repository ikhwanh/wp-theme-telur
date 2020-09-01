<?php
/**
 * telur functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package telur
 */

	/**
	 * release version
	 */
	if ( ! defined( 'TELUR_VERSION' ) ) {
	 	define( 'TELUR_VERSION', '0.0.1' );
	}


// variables
define('TELUR_LOGO_HEIGHT', 36);
define('TELUR_LOGO_WIDTH', 108);


/**
 * Theme Setup
 */
if ( ! function_exists( 'telur_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function telur_setup() {
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'telur' ),
			)
		);

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => TELUR_LOGO_HEIGHT,
				'width'       => TELUR_LOGO_WIDTH,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'telur_setup' );

// register the custom widgets
require 'widgets/categories.php';
require 'widgets/search.php';
require 'widgets/tags.php';

function telur_register_widget_categories() {
	register_widget('Telur_Categories_Widget');
}
function telur_register_widget_search() {
	register_widget('Telur_Search_Widget');
}
function telur_register_widget_tags() {
	register_widget('Telur_Tags_Widget');
}
add_action('widgets_init', 'telur_register_widget_categories');
add_action('widgets_init', 'telur_register_widget_search');
add_action('widgets_init', 'telur_register_widget_tags');

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function telur_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'telur' ),
			'id'            => 'sidebar-1',
			'after_widget' => '<li class="Dropdown-separator"></li>'
		)
	);
}
add_action( 'widgets_init', 'telur_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function telur_scripts() {
	wp_enqueue_style('flarum-style', get_stylesheet_uri(), array(), TELUR_VERSION);
	wp_enqueue_script('alpine', get_template_directory_uri().'/js/alpine.js', array(), TELUR_VERSION, true);
}
add_action( 'wp_enqueue_scripts', 'telur_scripts' );

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}



// echoing menu
function telur_get_menu() {
	wp_nav_menu(
		array(
			'depth' => 1,
			'container_class' => 'Header-primary',
			'container_id' => 'header-primary',
			'menu_class' => 'Header-controls',
			'menu_id' => '',
			'anchor_class' => 'LinksButton Button Button--link',
		)
	);
}

function telur_customize_nav_class($attr, $item, $args) {
	if(isset($args->anchor_class)) {
        $attr['class'] = $args->anchor_class;
    }
    return $attr;
}
add_filter('nav_menu_link_attributes', 'telur_customize_nav_class', 1, 3);

function telur_get_custom_logo_or_blog_name() {
	echo '<a href="'.esc_url(home_url('/')).'" rel="home">';

	$custom_logo_id = get_theme_mod( 'custom_logo' );
	$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
	if (has_custom_logo()) {
		echo '<img src="'.esc_url($logo[0]).'" width="'.TELUR_LOGO_WIDTH.'" height="'.TELUR_LOGO_HEIGHT.'"/>';
	} else {
		bloginfo('name');
	}

	echo '</a>';
}

