<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Lyretail
 */

$featuredimg = '';

if ( has_post_thumbnail() && ! is_archive() && ! is_front_page() && ! is_search() ) {
	$featuredimgurl = wp_get_attachment_image_src( get_post_thumbnail_id(), 'lyretail-featured' );
	$featuredimg = ' style="background-image: url(' . esc_url( $featuredimgurl[0] ) . ');"';
}
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'lyretail' ); ?></a>
	<a class="skip-link screen-reader-text" href="#open-menu"><?php _e( 'Skip to menu', 'lyretail' ); ?></a>

	<?php if ( has_nav_menu( 'primary' ) || is_active_sidebar( 'sidebar-1' ) || is_active_sidebar( 'sidebar-2' ) || is_active_sidebar( 'sidebar-3' ) ) { ?>
		<div class="slide-menu">
			<?php get_sidebar(); ?>
		</div>
	<?php } ?>

	<header id="masthead" class="site-header" role="banner" <?php echo $featuredimg; ?>>
		<?php if ( has_nav_menu( 'primary' ) || is_active_sidebar( 'sidebar-1' ) || is_active_sidebar( 'sidebar-2' ) || is_active_sidebar( 'sidebar-3' ) ) { ?>
			<button class="menu-toggle" id="open-menu" title="<?php esc_attr_e( 'Sidebar', 'lyretail' ); ?>"><span class="screen-reader-text"><?php _e( 'Sidebar', 'lyretail' ); ?></span></button>
		<?php } ?>
		<div class="site-branding">
			<?php if ( function_exists( 'jetpack_the_site_logo' ) ) : ?>
				<?php jetpack_the_site_logo(); ?>
			<?php endif; ?>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</div>

		<?php if ( has_nav_menu ( 'social' ) ) : ?>
			<?php wp_nav_menu( array( 'theme_location' => 'social', 'depth' => 1, 'link_before' => '<span class="screen-reader-text">', 'link_after' => '</span>', 'container_class' => 'social-links', ) ); ?>
		<?php endif; ?>

	</header><!-- #masthead -->

	<div id="content" class="site-content">
