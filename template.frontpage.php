<?php
/*
Template Name: Frontpage
*/

//create arguments for custom main loop
$args_global = array( 
	'post_type' => 'page',
	'post_parent' => get_the_ID(),
	'order' => 'ASC',
	'orderby' => 'menu_order',
	'posts_per_page' => 100
);
$loop_global = new WP_Query( $args_global );

get_header('frontpage'); ?>
	
	<?php do_action('events_before_content'); ?>
		<div id="frontpage-wrap" role="main">
			<?php if ( $loop_global->have_posts() ) : ?>
				<?php while ( $loop_global->have_posts() ) : $loop_global->the_post(); ?>
					<?php 
						$background_image = '';
						// check if there is a featured image - it willbe used as a parallax background
						if(has_post_thumbnail()) {
							$background_image = ' parallax" style="background-image: url(\''.wp_get_attachment_url(get_post_thumbnail_id()).'\');';
						}
						
						$background_color = '';
						
						if(stripos(get_the_content(), 'class="gk-color-bg"') !== FALSE) {
							$background_color = ' gk-color-bg';
						}
						
						$header_class = '';
						
						if(stripos(get_the_content(), 'class="mediumtitle"') !== FALSE) {
							$header_class = ' class="widget-title mediumtitle"';
						}
					?>
					<div class="frontpage-block<?php echo $background_color; ?><?php echo $background_image; ?>">
						<div class="frontpage-block-wrap">
							<h3<?php echo $header_class; ?>><?php the_title(); ?></h3>
							
							<?php the_content(); ?>
						</div>
					</div>
				<?php endwhile; ?>	
				
				<?php wp_reset_query(); ?>
			<?php endif; ?>
		</div><!-- frontpage-wrap -->
	<?php do_action('events_after_content'); ?>
<?php get_footer('frontpage'); ?>