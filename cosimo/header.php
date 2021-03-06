<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package cosimo
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php 
		$headerOpacity = get_theme_mod('cosimo_theme_options_headeropacity', '1');
		$hideSearch = get_theme_mod('cosimo_theme_options_hidesearch', '1');
	?>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( '跳到内容', 'cosimo' ); ?></a>
		<div class="whiteSpace">
			<?php
			if ( is_active_sidebar( 'sidebar-1' ) ) {
				echo '<div class="main-sidebar-box"><span></span></div>';
			}
			?>
			<?php if ($hideSearch == 1 ) : ?>
				<div class="main-search-box"><i class="fa fa-lg fa-search"></i></div>
			<?php endif; ?>
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fa fa-lg fa-bars"></i><?php esc_html_e( '主菜单', 'cosimo' ); ?></button>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
			</nav><!-- #site-navigation -->
			<?php if ($hideSearch == 1 ) : ?>
			<!-- Start: Search Form -->
			<div id="search-full">
				<div class="search-container">
					<form role="search" method="get" id="search-form" action="<?php echo home_url( '/' ); ?>">
						<label>
							<span class="screen-reader-text"><?php esc_html_e( '搜索:', 'cosimo' ); ?></span>
							<input type="search" name="s" id="search-field" placeholder="<?php esc_html_e('在这里输入并搜素', 'cosimo'); ?>">
						</label>
					</form>
					<span class="closeSearch"><i class="fa fa-close fa-lg"></i></span>
				</div>
			</div>
			<!-- End: Search Form -->
			<?php endif; ?>
		</div>
	<?php if (is_singular() && '' != get_the_post_thumbnail() ) : ?>
	<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id(), 'cosimo-normal-post'); ?>
		<header id="masthead" class="site-header" role="banner" style="background: url(<?php echo $src[0] ?>) 50% 0 / cover no-repeat;">
	<?php else: ?>
		<header id="masthead" class="site-header" role="banner" style="background: url(<?php header_image(); ?>) 50% 0 / cover no-repeat;">
	<?php endif; ?>
		<?php if ($headerOpacity == 1 ) : ?>
			<div class="cosimo-opacity">
		<?php endif; ?>
			<div class="cosimo-table">
				<div class="site-branding">
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<p class="site-description"><?php bloginfo( 'description' ); ?></p>
				</div><!-- .site-branding -->
			</div><!-- .cosimo-table -->
		<?php if ($headerOpacity == 1 ) : ?>
			</div><!-- .cosimo-opacity -->
		<?php endif; ?>
		
	</header><!-- #masthead -->

	<div id="content" class="site-content">
