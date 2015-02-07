<?php
/*
Template Name: Agenda
*/

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">			
			<?php do_action('events_before_content'); ?>
			<?php
				//create arguments for custom main loop
				$args_days = array( 
					'post_type' => 'page',
					'post_parent' => get_the_ID(),
					'order' => 'ASC',
					'orderby' => 'menu_order',
					'posts_per_page' => 999
				);
				$loop_days = new WP_Query($args_days);
				
				if ( $loop_days->have_posts() ) {
					while ( $loop_days->have_posts() ) {
						$loop_days->the_post(); 
						
						global $more;
						$more = 0;
						
						?>
						<div class="agenda-listing" data-cols="<?php echo $loop_days->post_count; ?>">
							<div class="day-content">
								<h2>
									<a href="<?php the_permalink(); ?>" class="inverse">
										<?php 
											$title = explode('&#8212;', get_the_title()); 
											
											if(count($title) > 1) {
												echo $title[0];
												echo '<small>' . $title[1] . '</small>';
											} else {
												echo $title[0];
											}
										?>
									</a>
								</h2>
								<?php the_content('', true); ?>
							</div>
							
							<?php 
								//create arguments for custom sub-loop
								$args_events = array( 
									'post_type' => 'page',
									'post_parent' => get_the_ID(),
									'order' => 'ASC',
									'orderby' => 'menu_order',
									'posts_per_page' => 999
								);
								$loop_events = new WP_Query($args_events);
							
								if ( $loop_events->have_posts() ) {
									while ( $loop_events->have_posts() ) {
										$loop_events->the_post(); ?>
										
										<?php
											// variable for the list items
											$event_hours = '';
											// get the post custom fields
											if ($keys = get_post_custom_keys()) {
												// generate the list
												foreach ((array) $keys as $key) {
													// trim the key name
													$key = trim($key);
													// filter the hours
													if($key === 'event-hours') {
														$event_hours = get_post_custom_values($key);
														break;
													}
												}
											}
										?>
										<article class="agenda-item">
											<?php if(has_post_thumbnail()) : ?>
											<a href="<?php the_permalink(); ?>" class="agenda-image"><?php the_post_thumbnail('medium'); ?></a>
											<?php endif; ?>
											
											<div class="agenda-content">
												<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
												<?php if(trim($event_hours[0]) !== '') : ?>
												<small><i class="gk-icon-clock"></i> <?php echo $event_hours[0]; ?></small>
												<?php endif; ?>
											</div>
										</article>
								<?php
									}
								}
								
								wp_reset_query();
								?>
						</div>
					<?php }
					
					wp_reset_query();
				}
			?>
			<?php do_action('events_after_content'); ?>
		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>