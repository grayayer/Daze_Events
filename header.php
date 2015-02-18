<?php
/**
 * The Header template for our theme
 *
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title('|', true, 'right'); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php do_action('events_head'); ?>
	<?php wp_head(); ?>
	
</head>
<body <?php body_class(get_theme_mod('events_blocks_color', 'events-light-blocks')); ?>>
	<!--[if lte IE 8]>
	<div id="ie-toolbar"><div><?php _e('You\'re using an unsupported version of Internet Explorer. Please <a href="http://windows.microsoft.com/en-us/internet-explorer/products/ie/home">upgrade your browser</a> for the best user experience on our site. Thank you.', 'events') ?></div></div>
	<![endif]-->
	<div id="gk-bg">
		<header id="gk-header" class="menu-visible" role="banner">
			<div id="gk-header-nav" class="static">
				<div id="gk-header-nav-wrap">
					<?php if(get_theme_mod('events_logo', '') == '') : ?>
					<a id="gk-logo-css" class="gk-small-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
						<span><?php bloginfo( 'name' ); ?></span>
					</a>
					<?php else : ?>
					<a id="gk-logo" class="gk-small-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
						<img src="<?php echo get_theme_mod('events_logo', ''); ?>" alt="<?php bloginfo( 'name' ); ?>" />
					</a>
					<?php endif; ?>
					
					<?php do_action('events_before_mainmenu'); ?>
					<nav id="site-navigation" class="main-navigation" role="navigation">
						<h3 class="menu-toggle"><?php _e( 'Menu', 'events' ); ?></h3>
						<a class="screen-reader-text skip-link" href="#content" title="<?php esc_attr_e( 'Skip to content', 'events' ); ?>"><?php _e( 'Skip to content', 'events' ); ?></a>
						
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
					</nav><!-- #site-navigation -->
					<?php do_action('events_after_mainmenu'); ?>
					
					<a href="#menu" id="aside-menu-toggler"><i class="fa fa-bars"></i></a>
				</div>
			</div>
			
			<?php if (is_active_sidebar('header')) : ?>
			<div id="gk-header-widget" role="complementary">
				<div class="widget-area">
					<?php do_action('events_before_header'); ?>
					<?php dynamic_sidebar('header'); ?>
					<?php do_action('events_after_header'); ?>
				</div>
			</div>
			<?php endif; ?>
		</header><!-- #masthead -->
				
		<div id="page" class="hfeed site">	
			<div id="main" class="site-main">
				<?php if (is_active_sidebar('top1')) : ?>
				<?php do_action('events_before_top1'); ?>
				<div id="gk-top1" role="complementary">
					<div class="widget-area gk-3-cols" data-cols="<?php echo GK_Utils::count_sidebar_widgets('top1', 3); ?>">
						<?php dynamic_sidebar('top1'); ?>
					</div>
				</div>
				<?php do_action('events_after_top1'); ?>
				<?php endif; ?>
				
				<?php if (is_active_sidebar('top2')) : ?>
				<?php do_action('events_before_top2'); ?>
				<div id="gk-top2" role="complementary">
					<div class="widget-area gk-3-cols" data-cols="<?php echo GK_Utils::count_sidebar_widgets('top2', 3); ?>">
						<?php dynamic_sidebar('top2'); ?>
					</div>
				</div>
				<?php do_action('events_after_top2'); ?>
				<?php endif; ?>