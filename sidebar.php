<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Lyretail
 */
?>

<div id="secondary" class="clear" role="complementary">
	<?php if ( is_active_sidebar( 'sidebar-1' ) || is_active_sidebar( 'sidebar-2' ) || is_active_sidebar( 'sidebar-3' ) ) : ?>
		<div class="widget-areas">
		<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
			<div class="widget-area">
				<?php dynamic_sidebar( 'sidebar-1' ); ?>
			</div>
		<?php endif; ?>

		<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
			<div class="widget-area">
				<?php dynamic_sidebar( 'sidebar-2' ); ?>
			</div>
		<?php endif; ?>

		<?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
			<div class="widget-area">
				<?php dynamic_sidebar( 'sidebar-3' ); ?>
			</div>
		<?php endif; ?>
		</div>
	<?php endif; ?>

	<?php if ( has_nav_menu ( 'primary' ) ) : ?>
	<div class="site-menu clear">
		<h2 class="widget-title main-navigation-title"><?php _e( 'Menu', 'lyretail' ); ?></h2>
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- #site-navigation -->
	</div>
	<?php endif; ?>
</div><!-- #secondary -->