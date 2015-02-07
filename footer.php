<?php
/**
 * The template for displaying the footer
 *
 */
 
?>
				<?php if (is_active_sidebar('bottom1')) : ?>
				<?php do_action('events_before_bottom1'); ?>
				<div id="gk-bottom1" role="complementary">
					<div class="widget-area gk-3-cols" data-cols="<?php echo GK_Utils::count_sidebar_widgets('bottom1', 3); ?>">
						<?php dynamic_sidebar('bottom1'); ?>
					</div>
				</div>
				<?php do_action('events_after_bottom1'); ?>
				<?php endif; ?>
				
				<?php if (is_active_sidebar('bottom2')) : ?>
				<?php do_action('events_before_bottom2'); ?>
				<div id="gk-bottom2" role="complementary">
					<div class="widget-area gk-3-cols" data-cols="<?php echo GK_Utils::count_sidebar_widgets('bottom2', 3); ?>">
						<?php dynamic_sidebar('bottom2'); ?>
					</div>
				</div>
				<?php do_action('events_after_bottom2'); ?>
				<?php endif; ?>
				
				<?php if (is_active_sidebar('bottom3')) : ?>
				<?php do_action('events_before_bottom3'); ?>
				<div id="gk-bottom3" role="complementary">
					<div class="widget-area gk-3-cols" data-cols="<?php echo GK_Utils::count_sidebar_widgets('bottom3', 3); ?>">
						<?php dynamic_sidebar('bottom3'); ?>
					</div>
				</div>
				<?php do_action('events_after_bottom3'); ?>
				<?php endif; ?>
			</div><!-- #main -->
		</div><!-- #page -->
	</div><!-- #gk-bg -->	

	<?php do_action('events_before_footer'); ?>
	<footer id="gk-footer" role="contentinfo">
		<?php if ( is_active_sidebar( 'bottom' ) ) : ?>
		<div id="gk-bottom" role="complementary">
			<div class="widget-area">
				<?php dynamic_sidebar( 'bottom' ); ?>
			</div>
		</div>
		<?php endif; ?>
		
		<div id="gk-footer-nav">
			<?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_class' => 'footer-menu' ) ); ?>
		</div>
		
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