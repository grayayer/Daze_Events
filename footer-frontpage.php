<?php
/**
 * The template for displaying the footer
 *
 */

?>
	</div><!-- #gk-bg -->	
	
	<?php do_action('events_before_footer'); ?>
	<footer id="gk-footer" role="contentinfo">
<!-- 		<div id="gk-footer-nav">
			<?php  /* wp_nav_menu( array( 'theme_location' => 'footer', 'menu_class' => 'footer-menu' ) ); */ ?>
		</div>
 -->		
		<div id="gk-copyrights">
			<p class="copyright"><?php echo get_theme_mod('events_copyright_text', '&copy; 2014 GavickPro. All rights reserved.'); ?></p>
		</div>
		
		<div id="gk-social">
			<?php wp_nav_menu( array( 'theme_location' => 'social', 'menu_class' => 'social-menu' ) ); ?>
		</div>
	</footer><!-- end of #gk-footer -->
	<?php do_action('events_after_footer'); ?>
	
	<?php do_action('events_before_asidemenu'); ?>
	<i id="close-menu" class="fa fa-times"></i>
	<aside id="aside-menu">
		<nav id="aside-navigation" class="main-navigation" role="navigation">
			<h3><?php _e( 'Menu', 'events' ); ?></h3>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-aside-menu' ) ); ?>
		</nav><!-- #aside-navigation -->
	</aside><!-- #aside-menu -->
	<?php do_action('events_after_asidemenu'); ?>

	<?php get_template_part('login', 'popup'); ?>

	<?php wp_footer(); ?>
</body>
</html>