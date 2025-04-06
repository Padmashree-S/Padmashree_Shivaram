<?php
/**
 * Lyretail functions and definitions
 *
 * @package Lyretail
 */

if ( ! function_exists( 'lyretail_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function lyretail_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on _s, use a find and replace
	 * to change 'lyretail' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'lyretail', get_template_directory() . '/languages' );

	/* Add support for editor styles */
	add_editor_style( array( 'editor-style.css', lyretail_fonts_url() ) );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'lyretail-featured', 2000, 2000 );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'lyretail_custom_background_args', array(
		'default-color' => 'ffffff',
	) ) );
}
endif; // lyretail_setup
add_action( 'after_setup_theme', 'lyretail_setup', 99 );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function lyretail_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'lyretail_content_width', 660 );
}
add_action( 'after_setup_theme', 'lyretail_content_width', 0 );

if ( ! function_exists( 'lyretail_scripts' ) ) :
/**
 * Enqueue scripts and styles.
 */
function lyretail_scripts() {
	wp_enqueue_style( 'lyretail-parent-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'lyretail-style', get_stylesheet_uri() );
	wp_enqueue_style( 'lyretail-fonts', lyretail_fonts_url(), array(), null );

	wp_enqueue_script( 'lyretail-script', get_stylesheet_directory_uri() . '/js/lyretail.js', array( 'jquery' ), '20150217', true );

	/* Dequeue parent styles/scripts */

	wp_dequeue_script( 'minnow-script' );
	wp_dequeue_style( 'minnow-opensans' );
}
add_action( 'wp_enqueue_scripts', 'lyretail_scripts', 99 );

endif;

/**
 * Register a second widget area
 *
 */
function lyretail_widgets_init() {

	unregister_sidebar( 'sidebar-1' );

	register_sidebar( array(
		'name'          => __( 'Header Widgets 1', 'lyretail' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => __( 'Header Widgets 2', 'lyretail' ),
		'id'            => 'sidebar-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => __( 'Header Widgets 3', 'lyretail' ),
		'id'            => 'sidebar-3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'lyretail_widgets_init', 99 );

/**
 * Register Google Fonts
 */
function lyretail_fonts_url() {
    $fonts_url = '';

	/* Translators: If there are characters in your language that are not
	 * supported by Lato, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$lato = _x( 'on', 'Lato font: on or off', 'lyretail' );

	/* Translators: If there are characters in your language that are not
	 * supported by Abril Fatface, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$abrilfatface = _x( 'on', 'Abril Fatface font: on or off', 'lyretail' );

	if ( 'off' !== $abrilfatface || 'off' !== $lato ) {

		$font_families = array();

		if ( 'off' !== $lato ) {
			$font_families[] = 'Lato:400,700,400italic,700italic';
		}

		if ( 'off' !== $abrilfatface ) {
			$font_families[] = 'Abril Fatface';
		}

		$query_args = array(
				'family' => urlencode( implode( '|', $font_families ) ),
				'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;

}

/**
 * Enqueue Google Fonts for custom headers
 */
function lyretail_admin_scripts( $hook_suffix ) {

	if ( 'appearance_page_custom-header' != $hook_suffix ) {
		return;
	}

	wp_enqueue_style( 'lyretail-fonts', lyretail_fonts_url(), array(), null );

}
add_action( 'admin_enqueue_scripts', 'lyretail_admin_scripts' );


/**
 * Overwrite parent theme's minnow_entry_format() function to change look/feel of post format links
 */
function minnow_entry_format() {

	$format = get_post_format();
	$formats = get_theme_support( 'post-formats' );

	//If the post has no format, or if it's not a format supported by the theme, return
	if ( ! $format || ! has_post_format( $formats[0] ) ) :
		return;
	endif;

	printf( '<span class="entry-format"><a href="%1$s" title="%2$s">%3$s</a></span>',
				esc_url( get_post_format_link( $format ) ),
				esc_attr( sprintf( __( 'All %s posts', 'lyretail' ), get_post_format_string( $format ) ) ),
				get_post_format_string( $format )
			);

}

/**
 * Adds custom classes to the array of post classes.
 *
 * @param array $classes Classes for the .hentry element.
 * @return array
 */
function lyretail_post_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( '' == get_the_title() ) {
		$classes[] = 'has-no-title';
	}
	return $classes;
}
add_filter( 'post_class', 'lyretail_post_classes' );

function lyretail_social_links_background() {
	if ( ! has_post_thumbnail() || is_archive() || is_front_page() || is_search() ) {
		return;
	}

	global $post;
	$featuredimgurl = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'lyretail-featured' );
	$css = '
		.social-links ul a {
			position: relative;
		}
		.social-links ul a:before,
		.social-links ul a:hover:before {
			background-color: transparent;
			background: -webkit-linear-gradient(transparent, transparent), url(' . esc_url( $featuredimgurl[0] ) . ') no-repeat;
			background: -o-linear-gradient(transparent, transparent);
			background-position: left center;
			-webkit-text-fill-color: transparent;
			-webkit-background-clip: text;
			z-index: 1;
		}
		.social-links ul a:after {
			background-color: rgba(255,255,255,0.75);
			border-radius: 50%;
			content: "";
			display: block;
			position: absolute;
				left: 0;
				top: 0;
			padding: 9px;
			width: 34px;
			height: 34px;
			margin: 3px 7px;
			-webkit-transition: 0.3s background-color;
			-moz-transition: 0.3s background-color;
			transition: 0.3s background-color;
		}
		.social-links ul a:hover:after {
			background-color: white;
			-webkit-transition: 0.3s background-color;
			-moz-transition: 0.3s background-color;
			transition: 0.3s background-color;
		}';

	wp_add_inline_style( 'lyretail-style', $css );
}
add_action( 'wp_enqueue_scripts', 'lyretail_social_links_background', 99 );


/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function lyretail_body_classes( $classes ) {
	// Adds a class of has-custom-header to sites with custom headers or featured header images
	if ( get_header_image() || ( has_post_thumbnail() && ! is_archive() && ! is_search() && ! is_home() ) ) {
		$classes[] = 'has-custom-header';
	}
	return $classes;
}
add_filter( 'body_class', 'lyretail_body_classes' );


/**
 * Implement the Custom Header feature.
 */
require get_stylesheet_directory() . '/inc/custom-header.php';


// updater for WordPress.com themes
if ( is_admin() )
	include dirname( __FILE__ ) . '/inc/updater.php';
