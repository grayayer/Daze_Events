<?php

	/*
		Template for the entry header
	*/
	
?>
<header class="entry-header">
	<h<?php echo is_single() ? '1' : '2'; ?> class="entry-title<?php if(is_sticky()) : ?> sticky<?php endif; ?>">
		<?php if(!is_single()) : ?>
		<?php
			// Post Formats			
			if(get_post_format() != '') {
				echo '<span class="format gk-format-'. get_post_format(). '"></span>';
			}
		?>
		<?php endif; ?>
		<?php if(!is_single()) : ?><a href="<?php the_permalink(); ?>" rel="bookmark" class="inverse"><?php endif; ?>
		<?php the_title(); ?>
		<?php if(!is_single()) : ?></a><?php endif; ?>
	</h<?php echo is_single() ? '1' : '2'; ?>>
	
	<?php if(is_single()) : ?>
	<small>
		<?php
			// Post author	
			if ( 'post' == get_post_type() ) {
				echo '<span>' . __( 'Written by ', 'events' ) . '</span>';
				printf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
					esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
					esc_attr( sprintf( __( 'View all posts by %s', 'events' ), get_the_author() ) ),
					get_the_author()
				);
			}
		?>
		
		<?php 
			// Translators: used between list items, there is a space after the comma.
			$categories_list = get_the_category_list( __( ', ', 'events' ) );
			if ( $categories_list ) {
				echo __('Published in ', 'events');
				echo '<span class="categories-links">' . $categories_list . '</span>';
			}
		?>
	</small>
	<?php else : ?>
	<p>
		<i class="gk-icon-calendar"></i>
		<?php
			if ('post' == get_post_type() ) {
				$date_format = esc_html(get_the_date('D j M')); 
				
				if(get_theme_mod('events_date_format', 'default') == 'wordpress') {
					$date_format = get_the_date(get_option('date_format'));
				} 
				
				$date = sprintf( '<time class="entry-date" datetime="'. esc_attr(get_the_date('c')) . '">'. $date_format . '</time>' );
			
				echo $date;
			}
		?>
		
		<?php
			// Post author	
			if ( 'post' == get_post_type() ) {
				echo '<span>' . __( 'Written by ', 'events' ) . '</span>';
				printf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
					esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
					esc_attr( sprintf( __( 'View all posts by %s', 'events' ), get_the_author() ) ),
					get_the_author()
				);
			}
		?>
	</p>
	<?php endif; ?>
	
	<?php if(is_single() && get_theme_mod('events_post_social_icons', '1') == '1') : ?>
	<?php do_action('events_before_social_icons'); ?>
	<div class="entry-social-sharing">
		<?php do_action('events_before_twitter_icon'); ?>
		
		<div class="entry-twitter-button">
			<a href="https://twitter.com/share" class="twitter-share-button" data-count="vertical">Tweet</a> 
			<script type="text/javascript" src="//platform.twitter.com/widgets.js"></script> 
		</div>
		
		<?php do_action('events_after_twitter_icon'); ?>
	
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
	
		<?php do_action('events_after_fb_icon'); ?>
	
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
		
		<?php do_action('events_after_gplus_icon'); ?>
	</div>
	<?php do_action('events_after_social_icons'); ?>
	<?php endif; ?>
</header><!-- .entry-header -->