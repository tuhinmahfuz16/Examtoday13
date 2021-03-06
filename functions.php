<?php
/**
 * WPMahfuz functions and definitions.
 *
 * @package WPMahfuz
 */

if ( ! function_exists( 'tuhin_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function tuhin_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on WPMahfuz, use a find and replace
	 * to change 'tuhin' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'tuhin', get_template_directory() . '/languages' );

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
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'tuhin' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'tuhin_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'tuhin_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function tuhin_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'tuhin_content_width', 640 );
}
add_action( 'after_setup_theme', 'tuhin_content_width', 0 );





add_action('init','init_functions_add');
function init_functions_add(){

	register_post_type('mahfuz-services', array(
		'labels' => array(
			'name' => __('Service', 'tuhin'),
			'add_new' => __('Add New Service', 'tuhin'),
			'add_new_item' => __('Add New Service', 'tuhin'),
		),
		'public' => true,
		'supports'=>array('title','editor','thumbnail'),
	));


	register_taxonomy('service-category','mahfuz-services',array(
		'labels' => array(
			'name' => __('Category', 'tuhin'),
			'add_new' => __('Add New Category', 'tuhin'),
			'add_new_item' => __('Add New Category', 'tuhin'),
		),
		'public' => true,
		'hierarchical'=> true
	));
	
}




/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function tuhin_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'tuhin' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'tuhin' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'tuhin_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function tuhin_scripts() {
	wp_enqueue_style( 'tuhin-style', get_stylesheet_uri() );

	wp_enqueue_style( 'tuhin-bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '20151216', true );
	wp_enqueue_style( 'tuhin-font', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '20151217', true );



	wp_enqueue_script( 'tuhin-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'tuhin-js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '20151218', true );





	wp_enqueue_script( 'tuhin-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'tuhin_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


if( file_exists( dirname( __FILE__ ) . '/lib/metabox/init.php' ) ) {
	require_once( dirname( __FILE__ ) . '/lib/metabox/init.php' );
}
if( file_exists( dirname( __FILE__ ) . '/lib/metabox/config.php' ) ) {
	require_once( dirname( __FILE__ ) . '/lib/metabox/config.php' );
}








