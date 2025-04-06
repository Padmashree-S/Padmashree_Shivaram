<?php
/**
 * Sample implementation of the Custom Header feature
 * http://codex.wordpress.org/Custom_Headers
 *
 * You can add an optional custom header image to header.php like so ...
	<?php if ( get_header_image() ) : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
	</a>
	<?php endif; // End header image check. ?>
 *
 * @package Lyretail
 */
/**
 * Set up the WordPress core custom header feature.
 *
 * @uses lyretail_header_style()
 * @uses lyretail_admin_header_style()
 * @uses lyretail_admin_header_image()
 */
function lyretail_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'lyretail_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => 'ffffff',
		'width'                  => 2000,
		'height'                 => 500,
		'flex-height'            => true,
		'wp-head-callback'       => 'lyretail_header_style',
		'admin-head-callback'    => 'lyretail_admin_header_style',
		'admin-preview-callback' => 'lyretail_admin_header_image',
	) ) );
}
add_action( 'after_setup_theme', 'lyretail_custom_header_setup' );
if ( ! function_exists( 'lyretail_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see lyretail_custom_header_setup().
 */
function lyretail_header_style() {

	$headerimg = get_header_image();
	$header_text_color = get_header_textcolor();

	// If no custom options for text or image are set, let's bail
	// get_header_textcolor() options: HEADER_TEXTCOLOR is default, hide text (returns 'blank') or any hex value
	if ( HEADER_TEXTCOLOR == $header_text_color && '' == $headerimg ) {
		return;
	}

	// If we get this far, we have custom styles. Let's do this. ?>
	<style type="text/css">
	<?php
		//Is there a header image?
		if ( $headerimg ) :
	?>
		.site-header {
			background-image: url( <?php echo esc_url( $headerimg ); ?> );
		}
		.social-links ul a {
			position: relative;
		}
		.social-links ul a:before,
		.social-links ul a:hover:before {
			background-color: transparent;
			background: -webkit-linear-gradient(transparent, transparent), url( <?php echo esc_url( $headerimg ); ?> ) no-repeat;
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
		}
	<?php endif; ?>

	<?php
		// Has the text been hidden?
		if ( 'blank' == $header_text_color ) :
	?>
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		// If the user has set a custom color for the text use that
		else :
	?>
		.site-title a,
		.site-description,
		.site-title a:hover {
			color: #<?php echo esc_attr( $header_text_color ); ?>;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif; // lyretail_header_style
if ( ! function_exists( 'lyretail_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * @see lyretail_custom_header_setup().
 */
function lyretail_admin_header_style() {
?>
	<style type="text/css">
		.appearance_page_custom-header #headimg {
			border: none;
			text-align: center;
		}
		#headimg h1,
		#desc {
		}
		#headimg h1 {
			font-family: "Abril Fatface", Georgia, Times, serif;
			font-size: 77px;
			font-size: 7.7rem;
			font-weight: normal;
			text-transform: none;
		}
		#headimg h1 a {
		}
		#desc {
		}
		#headimg img {
		}
	</style>
<?php
}
endif; // lyretail_admin_header_style
if ( ! function_exists( 'lyretail_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * @see lyretail_custom_header_setup().
 */
function lyretail_admin_header_image() {
	$style = sprintf( ' style="color:#%s;"', esc_attr( get_header_textcolor() ) );
?>
	<div id="headimg">
		<h1 class="displaying-header-text"><a id="name"<?php echo $style; ?> onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
		<div class="displaying-header-text" id="desc"<?php echo $style; ?>><?php bloginfo( 'description' ); ?></div>
		<?php if ( get_header_image() ) : ?>
		<img src="<?php header_image(); ?>" alt="">
		<?php endif; ?>
	</div>
<?php
}
endif; // lyretail_admin_header_image