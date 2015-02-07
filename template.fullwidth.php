<?php
/*
Template Name: Full-width
*/

$video_code = events_video_code();

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
				<article id="post-<?php the_ID(); ?>" <?php post_class('archive-page full-width'); ?>>
					<div>
						<header class="entry-header">
							<h<?php echo is_single() ? '1' : '2'; ?> class="entry-title<?php if(is_sticky()) : ?> sticky<?php endif; ?>">
								<?php if(!is_single()) : ?><a href="<?php the_permalink(); ?>" rel="bookmark" class="inverse"><?php endif; ?>
								<?php the_title(); ?>
								<?php if(!is_single()) : ?></a><?php endif; ?>
							</h<?php echo is_single() ? '1' : '2'; ?>>
							
							<?php if(is_singular() && get_theme_mod('events_page_social_icons', '') == '1') : ?>
							<div class="entry-social-sharing">
								<div class="entry-twitter-button">
									<a href="https://twitter.com/share" class="twitter-share-button" data-count="vertical">Tweet</a> 
									<script type="text/javascript" src="//platform.twitter.com/widgets.js"></script> 
								</div>
							
								<div class="entry-facebook-button"> 
									<script type="text/javascript">                                                         
										jQuery(window).load(function(){
											var root = document.createElement('div');
											root.id = 'fb-root';
											jQuery('.entry-facebook-button')[0].appendChild(root);
											(function(d, s, id) {
												var js, fjs = d.getElementsByTagName(s)[0];
												if (d.getElementById(id)) {return;}
												js = d.createElement(s); js.id = id;
												js.src = document.location.protocol + "//connect.facebook.net/en_US/all.js#xfbml=1";
												fjs.parentNode.insertBefore(js, fjs);
											}(document, 'script', 'facebook-jssdk')); 
										});
									</script>
									<div class="fb-like" data-width="150" data-layout="box_count" data-action="like" data-show-faces="false"></div>
								</div>
							
								<div class="entry-gplus-button">
									<div class="g-plusone" data-size="tall"></div>
									<script type="text/javascript">                              
									window.___gcfg = {lang: 'pl'};
									
									(function() {
										var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
										po.src = 'https://apis.google.com/js/platform.js';
										var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
									})();
									</script> 
								</div>
							</div>
							<?php endif; ?>
						</header><!-- .entry-header -->
	
						<div class="entry-content">
							<?php if ( has_post_thumbnail() && !post_password_required() ) : ?>			
								<div class="entry-thumbnail">
									<?php the_post_thumbnail(); ?>
								</div>
							<?php elseif($video_code) : ?>
								<div class="video-wrapper">
									<?php echo $video_code; ?>
								</div>
							<?php endif; ?>
						
							<?php the_content(); ?>
							<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'events' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
						</div><!-- .entry-content -->
						
						<?php if(current_user_can('edit_pages')) : ?>
						<footer class="entry-meta">
							<?php edit_post_link( __( 'Edit', 'events' ), '<span class="edit-link">', '</span>' ); ?>
						</footer><!-- .entry-meta -->
						<?php endif; ?>
					</div>
				</article><!-- #post -->

				<?php comments_template(); ?>
			<?php endwhile; ?>
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