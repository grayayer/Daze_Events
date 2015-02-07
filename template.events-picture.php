<?php
/*
Template Name: Events list with pictures
*/

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">			
			<?php if (is_active_sidebar('content_top')) : ?>
			<?php do_action('events_before_content'); ?>
			<div id="content-top" role="complementary">
				<?php dynamic_sidebar('content_top'); ?>
			</div>
			<?php do_action('events_after_content'); ?>
			<?php endif; ?>
			
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
						<div class="days-listing">
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
											$event_data = '';
											$event_hours = '';
											// get the post custom fields
											if ($keys = get_post_custom_keys()) {
												// generate the list
												foreach ((array) $keys as $key) {
													// trim the key name
													$key = trim($key);
													// filter the hours
													if($key !== 'event-hours' && $key !== 'event-btn') {
														// check only the speaker values
														if(substr($key, 0, 6) == 'event-') {
															$values = array_map('trim', get_post_custom_values($key));
															// extract the value
															$value = implode($values,', ');
															// change the custom fields keys to readable ones
															$key_name = explode('-', str_replace('event-', '', $key));
															$key_name = array_map('ucfirst', $key_name);
															$key_name = join(' ', $key_name);
															// generate the item
															$event_data .= apply_filters('the_meta_key', (($key_name != '') ? '<dt>'.$key_name.':</dt>' : '')."\n".'<dd>'.$value.'</dd>'."\n", $key, $value);
														}
													} elseif($key === 'event-hours') {
														$event_hours = get_post_custom_values($key);
													}
												}
												// output the list
												if($event_data !== '') {
													$event_data = '<dl class="extra-fields">' . "\n" . $event_data . '</dl>' . "\n";
												}
											}
										?>
										<article class="eventlist-item">
											<div class="eventlist-date">
												<?php echo $event_hours[0]; ?>
											</div>
											<div class="eventlist-content">
												<?php if(has_post_thumbnail()) : ?>
												<a href="<?php the_permalink(); ?>" class="eventlist-image"><?php the_post_thumbnail(); ?></a>
												<?php endif; ?>
												<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
												<?php the_excerpt(); ?>
											</div>
											<div class="eventlist-data">
												<?php echo $event_data; ?>
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
			
			<?php if (is_active_sidebar('content_bottom')) : ?>
			<?php do_action('events_before_content_bottom'); ?>
			<div id="content-bottom" role="complementary">
				<?php dynamic_sidebar('content_bottom'); ?>
			</div>
			<?php do_action('events_after_content_bottom'); ?>
			<?php endif; ?>	
		</div><!-- #content -->
		
		<?php if (is_active_sidebar('sidebar')) : ?>
		<?php do_action('events_before_sidebar'); ?>
		<aside id="sidebar" role="complementary">
			<?php dynamic_sidebar('sidebar'); ?>
		</aside>
		<?php do_action('events_after_sidebar'); ?>
		<?php endif; ?>
	</div><!-- #primary -->

<?php get_footer(); ?>