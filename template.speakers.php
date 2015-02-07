<?php
/*
Template Name: Speakers listing
*/

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			<?php if (is_active_sidebar('content_top')) : ?>
			<?php do_action('events_before_content_top'); ?>
			<div id="content-top" role="complementary">
				<?php dynamic_sidebar('content_top'); ?>
			</div>
			<?php do_action('events_after_content_top'); ?>
			<?php endif; ?>
			
			<?php do_action('events_before_content'); ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<div id="post-<?php the_ID(); ?>" <?php post_class('listing-page archive-page'); ?>>
					<div>
						<header class="entry-header">
							<h1>
								<?php the_title(); ?>
							</h1>
						</header><!-- .entry-header -->
	
						<div class="entry-content">
							<?php the_content(); ?>
						</div><!-- .entry-content -->
					</div>
				</div><!-- #post -->
			<?php endwhile; ?>
			
			<?php
				//create arguments for custom main loop
				$args_speakers = array( 
					'post_type' => 'page',
					'post_parent' => get_the_ID(),
					'order' => 'ASC',
					'orderby' => 'menu_order',
					'posts_per_page' => 999
				);
				$loop_speakers = new WP_Query($args_speakers);
				
				if ( $loop_speakers->have_posts() ) {
					while ( $loop_speakers->have_posts() ) {
						$loop_speakers->the_post(); 
						
						global $more;
						$more = 0;
						
						?>
						<article class="listing-item speakers-listing">
							<aside class="post-meta">
								<?php if ( has_post_thumbnail() && !post_password_required() ) : ?>			
								<div class="entry-thumbnail">
									<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail(); ?>
									</a>
								</div>
								<?php endif; ?>
							</aside>
							
							<div class="entry-content">
								<h3>
									<a href="<?php the_permalink(); ?>">
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
								</h3>
								<?php the_content(''); ?>
							</div>
							
							<footer class="entry-meta">
								<?php
									// get the post custom fields
									if ($keys = get_post_custom_keys()) {
										// variable for the list items
										$output = '';
										// generate the list
										foreach ((array) $keys as $key) {
											// trim the key name
											$key = trim($key);
											// check only the speaker values
											if(substr($key, 0, 8) == 'speaker-') {
												$values = array_map('trim', get_post_custom_values($key));
												// extract the value
												$value = implode($values,', ');
												// change the custom fields keys to readable ones
												$key_name = explode('-', str_replace('speaker-', '', $key));
												$key_name = array_map('ucfirst', $key_name);
												$key_name = join(' ', $key_name);
												// generate the item
												$output .= apply_filters('the_meta_key', '<dt>'.$key_name.':</dt>'."\n".'<dd>'.$value.'</dd>'."\n", $key, $value);
											}
										}
										// output the list
										if($output !== '') {
											echo '<dl class="extra-fields">' . "\n";
											echo $output;
											echo '</dl>' . "\n";
										}
									}
								?>
							</footer><!-- .entry-meta -->
						</article>
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